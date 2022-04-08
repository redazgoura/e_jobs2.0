@extends('layouts.app')
@section("scripts")
<script src="/js/register_recruteur_fields.js" defer></script>
@endsection
@section('content')
<div class="container">
    
            <div class="card p-0" style="margin:0 100px 0 100px">
                <div class="card-header  d-flex justify-content-center">{{ __('CREER VOTRE COMPTE') }}</div>

                <div class="card-body">

                    <div class="row  d-flex justify-content-center "> 
                        <div class="col-5 align-self-center border-3 border-right border-3  p-0">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                        <label for="type" class="col-md-3 col-form-label text-md-right">{{ __('Êtes-vous?') }}</label>
            
                                        <div class="col-md-7 mb-3">
                                            <select name="type" id="type" class="form-control">
                                            <option value="postulant">Postulant</option>
                                            <option value="recruteur">Recruteur</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div id="postulantData">
                                        <div class="form-group row">
                                            <label for="postulantCv" class="col-md-3 col-form-label text-md-right">{{ __('CV') }}</label>
                
                                            <div class="col-md-7 mb-3">
                                                <input id="postulantCv" type="file" class="form-control @error('postulantCv') is-invalid @enderror" name="postulantCv" value="{{ old('postulantCv') }}" autocomplete="postulantCv">
                
                                                @error('postulantCv')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div id="recruteurData">
                                        <div class="form-group row">
                                            <label for="" class="col-md-3 col-form-label text-md-right">{{ __('Nom Entreprise') }}</label>
                
                                            <div class="col-md-7 mb-3">
                                                <input id="" type="text" class="form-control @error('nom_entreprise') is-invalid @enderror" name="nom_entreprise" value="{{ old('nom_entreprise') }}" autocomplete="">
                
                                                @error('nom_entreprise')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-3 col-form-label text-md-right">{{ __('ICE') }}</label>
                
                                            <div class="col-md-7 mb-3">
                                                <input id="" type="text" class="form-control @error('ICE') is-invalid @enderror" name="ice" value="{{ old('ice') }}" autocomplete="">
                
                                                @error('ice')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="photoProfil" class="col-md-3 col-form-label text-md-right">{{ __('Photo') }}</label>
            
                                        <div class="col-md-7">
                                            <input id="photoProfil" type="file" class="form-control @error('photoProfil') is-invalid @enderror" name="photoProfil" value="{{ old('photoProfil') }}" required autocomplete="photoProfil">
            
                                            @error('photoProfil')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                        </div>
                        
        <div class="col-5  mt-2 ">

            <div class="form-group row">
                <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                <div class="col-md-8">
                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>

                <div class="col-md-8">
                    <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom">

                    @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>
                <div class="col-md-8">
                    <select name="ville" id="ville" class="form-control @error('ville') is-invalid @enderror">
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

            <div class="form-group row">
                <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

                <div class="col-md-8">
                    <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse">

                    @error('adresse')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Région') }}</label>
                <div class="col-md-8">
                    <select name="region" id="region" class="form-control @error('region') is-invalid @enderror">
                        @foreach($regions as $item)

                        <option value="{{$item->region}}">{{$item->region}}</option>

                        @endforeach
                    </select>

                
                        @error('region')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="domaine" class="col-md-4 col-form-label text-md-right">{{ __('Domaine') }}</label>
                <!--Fill Select options with domaine names -->

                <div class="col-md-8">
                    <select name="domaine" id="domaine" class="form-control @error('domaine') is-invalid @enderror">
                        @foreach($domaines as $item)

                        <option value="{{$item}}">{{$item}}</option>

                        @endforeach
                    </select>

                
                        @error('domaine')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

            </div>

            <div class="form-group row">
                <label for="numeroTele" class="col-md-4 col-form-label text-md-right">{{ __('Numero De Telephone') }}</label>

                <div class="col-md-8">
                    <input id="numeroTele" type="text" class="form-control @error('numeroTele') is-invalid @enderror" name="numeroTele" value="{{ old('numeroTele') }}" required autocomplete="numeroTele">

                    @error('numeroTele')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

               
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-8">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0 ">
                    <div class="col-md-8 offset-md-4 mt-2">
                        <button type="submit" class="btn btn-primary btn-block mb-3">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
    
            </form>

            </div>

         

        </div>

                    </div>
                   
                </div>
            </div>
       
</div>
@endsection
