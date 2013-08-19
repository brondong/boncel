@if (count($data))
  <table class="table table-striped">
    <thead>
      <th>URL</th>
      <th>Short</th>
      <th>Date</th>
    </thead>

    <tbody>
      @foreach ($data as $url)
        <tr>
          <td><a href="{{ $url->url }}" target="_blank">{{ substr($url->url, 0, 40) }}</a></td>
          <td><a href="{{ route('home') . $url->short }}" target="_blank">{{ substr(route('home') . $url->short, 0, 30) }}</a></td>
          <td>{{ date('d-m-Y', strtotime($url->created_at)) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ str_replace('href', 'data-target', $data->links()) }}
@endif