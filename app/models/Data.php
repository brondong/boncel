<?php

class Data extends Eloquent {
	
	protected $table = 'url';
	protected $fillable = array('ip', 'url', 'short');
	protected $guarded = array('id');

	public static function cek($short)
	{
		$data = Data::where('short', '=', $short);
		return ($data) ? false : true;
	}

	public static function tambah($ip, $url, $short)
	{
		Data::create(compact('ip', 'url', 'short'));
	}

	public static function ip($ip)
	{
		return Data::where('ip', '=', $ip)->orderBy('created_at', 'desc')->paginate(5);
	}

	public static function short($short)
	{
		return Data::where('short', '=', $short)->first();
	}
}