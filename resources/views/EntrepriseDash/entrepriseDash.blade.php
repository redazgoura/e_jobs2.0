@extends('layouts.app')
@section("scripts")
<script src="/js/register_recruteur_fields.js" defer></script>
@endsection
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
    <a href="/EntrepriseDash/{{ Auth::user()->id }}" class="w3-bar-item w3-button text-white ">Dashboard</a>
    
  </div>
  
  <!-- Page Content -->
  <div style="margin-left:20%">
  
  
  
   
            <div class="page-wrapper">
            
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Profile page</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal"></a></li>
                    </ol>
                    {{-- <a href="https://www.wrappixel.com/templates/ampleadmin/" target="_blank"
                        class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Actualiser</a> --}}
                    </div>
                </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <!-- Container fluid  -->
            <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <!-- Row -->
                    <div class="card">
                        <div class="row">
                        <!-- Column -->
                            <div class="col-4">
                                <div class="white-box">
                                <div class="user-bg"> <img width="100%" alt="" src="/plugins/images/large/img1.jpg">
                                    <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="/assets/profile_pics/{{Auth::user()->photo_profil}}" class="thumb-lg img-circle"
                                            alt="img"></a>
                                        <h4 class="text-white mt-2">{{ $showUserEntreprise->nom}}&nbsp;{{ $showUserEntreprise->prenom}}</h4>
                                        <h5 class="text-white mt-2">{{ $showUserEntreprise->email}}</h5>
                                    </div>
                                    </div>
                                </div>
                               
                                </div>
                            </div>


                            
                            <!-- Column -->
                            <div class="col-4">
                                
                                <div class="card-body">
                                    <form method="POST" action="/EntrepriseDash/{{$showUserEntreprise ->id}}" enctype="multipart/form-data">

                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}

                                        <input type="hidden" name="id" value="{{$showUserEntreprise->id}}">

                                        <input type="hidden" name="password" value="{{$showUserEntreprise->password}}">

                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">{{ __('Nom') }}</label>
                                            <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  class="form-control  border-0 @error('nom') is-invalid @enderror" name="nom" value="{{$showUserEntreprise->nom}}" autocomplete="type" >
                                            @error('nom')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                            </div> 
                                        </div>
                    
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">{{ __('Prenom') }}</label>
                                            <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  class="form-control  border-0 @error('type') is-invalid @enderror" name="prenom" value="{{$showUserEntreprise->prenom}}" autocomplete >
                                            @error('prenom')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                            </div> 
                                        </div>
                    
                                    
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">{{ __('Email') }}</label>
                                            <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  class="form-control  border-0 @error('type') is-invalid @enderror" name="email" value="{{$showUserEntreprise->email}}" autocomplete="type" >
                                            @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                            </div> 
                                        </div>
                    
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">{{ __('Télephone') }}</label>
                                            <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  class="form-control border-0 @error('type') is-invalid @enderror" name="numeroTele" value="{{$showUserEntreprise->numeroTele}}" autocomplete="type" >
                                            @error('numeroTele')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                            </div> 
                                        </div>
                                        
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">{{ __('Adresse') }}</label>
                                            <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  class="form-control  border-0 @error('adresse') is-invalid @enderror" name="adresse" value="{{$showUserEntreprise->adresse}}" autocomplete >
                                            @error('adresse')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                            </div> 
                                        </div>
                    
                                        <div class="form-group mb-4">
                                            <label class="col-sm-12 p-0">{{ __('Ville') }}</label>
                                        
                                            <div class="col-sm-12 border-bottom">
                                            <select name="ville" id="ville" class="form-select shadow-none  border-0 @error('ville') is-invalid @enderror">
                                                @foreach($villes as $item)
                    
                                                <option value="{{$item->ville}}">{{$item->ville}}</option>
                    
                                                @endforeach
                                            </select>
                                                @error('ville')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                    
                    
                                        <div class="form-group mb-4">
                                            <label class="col-sm-12 p-0">{{ __('Région') }}</label>
                                        
                                            <div class="col-sm-12 border-bottom">
                                            <select name="region" id="region" class="form-select shadow-none  border-0 @error('region') is-invalid @enderror">
                                                @foreach($regions as $item)
                        
                                                <option value="{{$showUserEntreprise->region}}">{{$item->region}}</option>
                        
                                                @endforeach
                                            </select>
                                                @error('region')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        
                                    

                                </div>

                            
                            </div> 

                            <div class="col-4">
                                
                                <div class="card-body">

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">{{ __('Type') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                        <input type="text"  class="form-control border-0 @error('type') is-invalid @enderror" name="type" value="recruteur" autocomplete="type" readonly>
                                        @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                        </div> 
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">{{ __('Nom Enreprise') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                        <input type="text"  class="form-control  border-0 @error('nom_entreprise') is-invalid @enderror" name="nom_entreprise" value="{{$showUserEntreprise->nom_entreprise}}" autocomplete="type" >
                                        @error('nom_entreprise')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                        </div> 
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">{{ __('ICE') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                        <input type="text"  class="form-control  border-0 @error('ICE') is-invalid @enderror" name="ice" value="{{$showUserEntreprise->ice}}" autocomplete="type" >
                                        @error('ice')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                        </div> 
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-sm-12 p-0">{{ __('Domaine') }}</label>
                                    
                                        <div class="col-sm-12 border-bottom">
                                        <select name="domaine" id="domaine" class="form-select shadow-none  border-0 @error('domaine') is-invalid @enderror">
                                            @foreach($domaines as $item)
                            
                                            <option value="{{$showUserEntreprise->domaine}}">{{$item}}</option>
                            
                                            @endforeach
                                        </select>
                                            @error('domaine')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">{{ __('Photo de profil') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                        <input type="file"  class="form-control border-0 @error('photoProfil') is-invalid @enderror" name="photoProfil" value="{{$showUserEntreprise->photoprofil}}" autocomplete="type" >
                                        @error('photoProfil')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                        </div> 
                                    </div>

                                    
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Modifier Profile</button>
                                        </div>
                                    </div>
                                </div>
                            
                            </div> 
                            </form>  
                        
                        </div>
                        <!-- Row -->
                    </div>

                </div>

            </div>
    

  </div>
@endsection
