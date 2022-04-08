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

        <div class="row justify-content-center">
            <div class="col-md-8">
        @if (count($infoCandidatures)>0)
            
        <h3 class="text-center mt-5">Candidatures</h3>
        <div style="margin-top:5%">
                @foreach ($infoCandidatures as $info)
                    <div class="container my-2">
                        <div class="card">
                            <div class="card-header">
                                <a href="/offre/{{$info["infoOffre"][0]->id}}" target="_self">{{$info["infoOffre"][0]->titre_offre}}</a>
                                <small class="ml-2">{{$info["datePostulation"]}}</small>
                            </div>
                            {{-- <a href="/voir/cs/{{$info["infoOffre"][0]->titre_offre}}">détail offre...</a> --}}
                            <div class="card-body">
                              <h5 class="card-title">Nom du condidat : <span class="fst-normal">{{$info["infoUser"][0]->nom}} {{$info["infoUser"][0]->prenom}}</span></h5>
                              <p class="card-title fw-bold">E-mail du condidat : {{$info["infoUser"][0]->email}}</p>
                               <a class="btn btn-primary"target="_blank" href="/voir/cv/{{$info["infoCandidat"][0]->path_cv}}">voir CV</a>
        
                            </div>
                          </div>
                         
                    </div>
                @endforeach
        </div>
        @else
        <div class="row justify-content-center text-center mt-5"> 
            <div class="col-md-6">
                <h1 class="">AUCUN CANDIDAT N'A POSTULER A VOS OFFRE(s)</h1>
            </div>
        </div>
            
        @endif
            </div>
        </div>

    </div>



@endsection