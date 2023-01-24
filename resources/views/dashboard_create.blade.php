@include('head');

<form method="POST" action="{{ url('dashboard/assignMaterielOnClient') }}">
    <!-- Success message -->
    @if(Session::has('success'))
      <div class="alert alert-success">
          {{Session::get('success')}}
      </div>
    @endif
    
    @csrf
      <div class="form-group row">
        <label for="materiel_name" class="col-4 col-form-label">Selectionnez un matériel</label> 
        <div class="col-8">
            <div class="col-8">
                <select name="materiel" id="materiel" class="form-select">
                  <option value=""></option>
                  @foreach ($materiels as $materiel)
                      <option value="{{$materiel->id}}">{{$materiel->nom}}</option>
                  @endforeach
                </select>
              </div>
        </div>
      </div>
        <div class="form-group row">
          <label for="materiel_prix" class="col-4 col-form-label">Selectionnez un client</label> 
          <div class="col-8">
            <select name="client" id="client" class="form-select">
              <option value=""></option>
              @foreach ($clients as $client)
                  <option value="{{$client->id}}">{{$client->prenom}}</option>
              @endforeach
            </select>
          </div>
        </div>   
      <div class="form-group row">
        <div class="offset-4 col-8">
          <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>