@include('head')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#ID LIEN</th>
        <th scope="col">Prénom</th>
        <th scope="col">Nom du matériel</th>
        <th scope="col">Prix du matériel</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($collection as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->client_nom}}</td>
                <td>{{$item->materiel_nom}}</td>
                <td>{{$item->materiel_prix}} €</td>
                <td>{{date('d-m-Y', strtotime($item->lien_date))}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>