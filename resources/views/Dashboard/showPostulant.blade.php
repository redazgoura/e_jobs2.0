@extends('layouts.app')

@section('content')
@include('includes.messages')
<div class="container my-3">
  

  <div class="row justify-content-center">
    <div class="col-md-10">
    
  <h3 class="text-center my-3" >Postulant Dashboard</h3>

  <a class="btn btn-primary my-2"  href="/Dashboard/{{$showUser->id}}/edit">Modifier Vos Données et Mot De Passe</a>
    <div class="row justify-content-center">
      <div class="col-md-6">
        
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Infos</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Nom Complet :</th>
        <td>{{ $showUser->nom}}<span> </span>{{ $showUser->prenom}}</td>
        
      </tr>

      <tr>
      <th scope="row">Tel N° :</th>
        <td colspan="2">{{ $showUser->numeroTele}}</td>
      </tr>

      <tr>
        <th scope="row">Email :</th>
        <td>{{ $showUser->email}}</td>
   
      </tr>

      <tr>
        <th scope="row">Ville :</th>
        <td colspan="2">{{ $showUser->ville}}</td>
      
      </tr>

      <tr>
        <th scope="row">Region :</th>
        <td colspan="2">{{ $showUser->region}}</td>
      </tr>

      <tr>
        <th scope="row">Adresse :</th>
        <td colspan="2">{{ $showUser->adresse}}</td>
      </tr>

      <tr>
        <th scope="row">Domaine :</th>
        <td colspan="2">{{ $showUser->domaine}}</td>
      </tr>

      
    </tbody>
    </table>

      </div>
    
        
      <div class="col-md-6">
        <iframe src="/voirPostulantCv/{{ $showUser->path_cv }}" style="width:100%;height:500px;">
        
        </iframe>
      </div>
    </div>
    </div>
  </div>

</div>
 
@endsection
