@include('head')
@if (count($items) > 0)
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID CLIENT</th>
      <th scope="col">TOTAL</th>
      <th scope="col">NB MATERIEL</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($items as $item)
          <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->total}} €</td>
              <td>{{$item->total_materiel}}</td>
          </tr>
      @endforeach
  </tbody>
</table>
@else
    <h3>Aucune donnée pour le moment.</h3>
@endif