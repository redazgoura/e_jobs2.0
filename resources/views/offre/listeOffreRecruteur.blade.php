@extends('layouts.app')
@section('content')

<div class="preloader">
  <div class="lds-ripple">
    <div class="lds-pos"></div>
    <div class="lds-pos"></div>
  </div>
</div>

 <div class="w3-sidebar w3-light-grey w3-bar-block  bg-dark" style="width:20%">
  <div class="row justify-content-center">
    <h3 class="text-center text-white my-5">Menu</h3>
  </div>

    <a href="/EntrepriseDash/{{ Auth::user()->id }}" class="w3-bar-item w3-button text-white">Dashboard</a>
 

  </div>
  
  <!-- Page Content -->
<div style="margin-left:20%">
  @include('includes.messages')

 
      
    @if (count($myOffres)>0)
    <div class="row justify-content-center text-center my-4"> 
      <div class="col-md-6">
          <h1 class="">LISTES DES OFFRES</h1>
          
      </div>
  </div>
          
      
          @foreach ($myOffres as $offre)

              <div class="container my-1">
                
                <div class="row justify-content-center">
                  
                <div class="col-md-8 my-2">
                  
                          
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col"> {{$offre->titre_offre}} --<span> {{\Carbon\Carbon::parse($offre->created_at)->diffForHumans()}}</span></th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">Domaine :</th>
                          <td>{{$offre->domaine_offre}}</td>
                          
                        </tr>
                  
                        <tr>
                        <th scope="row">Type de contrat :</th>
                          <td colspan="2">{{$offre->contrat_offre}}</td>
                        </tr>
                  
                        <tr>
                          <th scope="row">Date de création d'offre :</th>
                          <td>{{$offre->date_offre}}</td>
                    
                        </tr>
                  
                        <tr>
                          <th scope="row">Salaire :</th>
                          <td colspan="2">{{$offre->salaire_offre}} <span class="fw-bold">DH</span></td>
                        
                        </tr>
                  
                        <tr>
                          <th scope="row">Pour :</th>
                          <td colspan="2"> {{$offre->fonction_offre}}</td>
                        </tr>
                  
                        <tr>
                          <th scope="row">Niveau d'etude souhaiter :</th>
                          <td colspan="2">{{$offre->niveau_etude_offre}}</td>
                        </tr>
                  
                        <tr>
                          <th scope="row">Région :</th>
                          <td colspan="2">{{$offre->region_offre}}</td>
                        </tr>

                        
                      </tbody>
                      <div class="d-flex">
                        <a href="/offre/{{$offre->id}}/edit" class="btn btn-success">Modifer</a>
                        <form class="mx-1" method="POST" action="/offre/{{$offre->id}}">@csrf @method("DELETE")<button class="btn btn-danger">Supprimer</button></form>
                      </div>
                      
                    </table>
                      
                  
                </div>   
                </div>
                </div>  

                    @endforeach
                    @else
                    <div class="row justify-content-center text-center mt-5"> 
                        <div class="col-md-6">
                            <h1 class="">VOUS N'AVEZ AUCUN OFFRE</h1>
                            <a class="btn btn-primary text-end" href="offre/create">Créer une offre</a>
                        </div>
                    </div>
                @endif
              </div>  
  </div>

@endsection