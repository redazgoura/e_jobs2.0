@extends('layouts.app')
@section('content')



    <div class="container my-2">
        
        <div class="row justify-content-center">
          <div class="col-md-8 text-end">

            {{-- <a class="btn btn-primary " href="/EntrepriseDash/{{ Auth::user()->id }}"><<< Back</a> --}}

          </div>
          

    <h3 class="text-center my-5 ">Détails Offre</h3>

     
            <div class="col-md-8">
              
                      
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
                  </table>
                  
              
             </div>   
            </div>
            </div>
            </div>
    </div>


@endsection