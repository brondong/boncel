<?php

Route::get('/', array('as' => 'home', function()
{
	return View::make('home');
}));

Route::get('tabel', array('before' => 'ajax', 'as' => 'tabel', function()
{
	$ip = Request::getClientIp();
	$data = Data::ip($ip);
	return View::make('table', compact('data'));
}));

Route::post('submit', array('before' => 'ajax', 'as' => 'submit', function()
{
	// custom validation
	Validator::extend('tabel', function($attribute, $value, $parameters)
	{
		return strtolower($value) != 'tabel';
	});

	// custom messages
	$messages = array( 'tabel' => 'Format inputan :attribute tidak valid.');
	$data = Input::all();
	$rules = array('url' => 'required|url|max:200', 'alias' => 'regex:/^[\w.]+$/i|unique:url,short|tabel|max:40');
	$validasi = Validator::make($data, $rules, $messages);

	// tidak valid
	if ($validasi->fails()) {
		$url = $validasi->messages()->first('url') ?: '';
		$alias = $validasi->messages()->first('alias') ?: '';
		$status = 'error';
		return Response::json(compact('url', 'alias', 'status'));
	// valid
	} else {
		$ip = Request::getClientIp();
		$url = Input::get('url');
		$alias = Input::get('alias');

		// ada alias
		if ($alias) {
			$short = $alias;

			// menghindari URL yang sama dengan AJAX tabel
			if ($alias == 'tabel') {
				
			}
		// tidak ada alias
		} else {
			// cek data di db
			$cek = false;
			do {
				// acak short
				$short = str_random(5);
				$cek = Data::cek($short);
			} while ($cek == true);
		}

		// tambah data
		Data::tambah($ip, $url, $short);

		$hasil = URL::to('/' . $short); 

		return Response::json(compact('hasil'));
	}  
}));

Route::get('{short}', function($short)
{
	// cek short
	$cek = Data::short($short);

	// ada 
	if ($cek) {
		$url = $cek->url;
		return Redirect::to($url);
	// tidak ada
	} else {
		return Response::make(View::make('errors.404'), 404); 
	}
})->where('short', '[\w.]+');