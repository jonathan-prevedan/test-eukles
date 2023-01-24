<form  class="row g-3 needs-validation" method="POST" action="{{ url('materiel/insert') }}" novalidate>
  <!-- Success message -->
  @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
  @endif
  
  @csrf
    <div class="form-group row">
      <label for="materiel_name" class="col-4 col-form-label">Nom du matériel</label> 
      <div class="col-8">
        <input id="materiel_name" name="materiel_name" placeholder="materiel_name" type="text" class="form-control" required="required">
        <div class="invalid-feedback">
          Veuillez saisir un nom pour le matériel
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="materiel_description" class="col-4 col-form-label">Description du matériel</label> 
      <div class="col-8">
        <input id="materiel_description" name="materiel_description" placeholder="materiel_description" type="text" class="form-control" required="required">
        <div class="invalid-feedback">
          Veuillez saisir une description pour le matériel
        </div>
      </div>
    </div>
    <div class="form-group row">
        <label for="materiel_prix" class="col-4 col-form-label">Prix du matériel</label> 
        <div class="col-8">
          <input id="materiel_prix" name="materiel_prix" min="0" placeholder="materiel_prix" type="number" class="form-control" required="required">
          <div class="invalid-feedback">
            Le nombre doit être supérieur à 0
          </div>
        </div>
      </div>  
    <div class="form-group row">
      <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
  