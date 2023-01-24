@include('head');

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID CLIENT</th>
        <th scope="col">TOTAL</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($clients as $item)
        @if ($rentable === $item->id)
            <tr class="table-success">
        @else
            <tr>
        @endif
                <td>{{$item->id}}</td>
                <td>{{$item->total}} €</td>
            </tr>
        @endforeach
    </tbody>
  </table>