<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Eukles</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/dashboard')}}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/materiel/create')}}">Crée un matériel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{'/dashboard/createMaterielClient'}}">Affiliez un matériel à un client</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/dashboard')}}">Tableau des liens</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/dashboard/TotauxByClient')}}">Totaux des clients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/dashboard/exercice')}}">Exercice 1</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>