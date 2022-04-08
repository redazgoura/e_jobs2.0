@extends('layouts.app')
@section('content')
<div class="container">
  <h1 class="well text-center display-5">Modifier une offre</h1>
<div class="col-lg-12 well">
<div class="row">
      <form id="createOffreForm" method="POST" action="/offre/{{$offre->id}}">
        @csrf
        @method("PUT")
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-6 form-group">
              <label>Titre</label>
              <input type="text" placeholder="Entrez le titre d'offre" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ $offre->titre_offre }}" required autocomplete="titre" autofocus>
            </div>
            <div class="col-sm-6 form-group">
              <label>Type contrat</label>
              {{-- <input type="date" placeholder="Enter Last Name Here.." class="form-control"> --}}
              <select name="typeContrat" id="" class="form-control">
                @foreach ($typesContrat as $item)
                    <option value="{{$item}}">{{$item}}</option>
                @endforeach
              </select>
            </div>
          </div>					
          <div class="form-group">
            <label>Contenu d'offre</label>
            <textarea placeholder="Le contenu de votre offre..." rows="3" class="form-control" name="contenu_offre">{{$offre->contenu_offre}}</textarea>
          </div>	
          <div class="row">
            <div class="col-sm-4 form-group">
              <label>Domaine</label>
              {{-- <input type="text" placeholder="Enter City Name Here.." class="form-control"> --}}
              <select name="domaine" id="" class="form-control">
                @foreach ($domaines as $item)
                    <option value="{{$item}}">{{$item}}</option>
                @endforeach
              </select>
            </div>	
            <div class="col-sm-4 form-group">
              <label>Fonction</label>
              {{-- <input type="text" placeholder="Enter State Name Here.." class="form-control"> --}}
              <select name="fonction" id="" class="form-control">
                @foreach ($fonctions as $item)
                    <option value="{{$item}}">{{$item}}</option>
                @endforeach
              </select>
            </div>	
            <div class="col-sm-4 form-group">
              <label>Région</label>
              {{-- <input type="text" placeholder="Enter Zip Code Here.." class="form-control"> --}}
              <select name="region" id="" class="form-control">
                @foreach ($regions as $item)
                    <option value="{{$item->region}}">{{$item->region}}</option>
                @endforeach
              </select>
            </div>		
          </div>
          <div class="row">
            <div class="col-sm-6 form-group">
              <label>Salaire</label>
              <input type="text" placeholder="Entrez le salaire de l'offre.." class="form-control" name="salaire" value="{{$offre->salaire_offre}}">
            </div>	
            <div class="col-sm-6 form-group">
              <label>Niveau d'étude</label>
              <input type="text" placeholder="Entrez le niveau d'étude requis.." class="form-control" name="niveauEtude" value="{{$offre->niveau_etude_offre}}">
            </div>		
          </div>						
        <button class="btn btn-lg btn-info btn-block" type="submit">Submit</button>					
        </div>
      </form> 
      </div>
</div>
</div>
@endsection