@extends('layouts.app')
@section("scripts")
<script src="/js/register_recruteur_fields.js" defer></script>
@endsection
@section('content')
<div class="container">
    
            <div class="card p-0" style="margin: 100px 0 100px">
                <div class="card-header  d-flex justify-content-center">{{ __('Modifier votre compte') }}</div>
                <div class="card-body">
                  
                    <form method="POST" action="/Dashboard/{{$showUser ->id}}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
    
                        <input type="hidden" name="id" value="{{$showUser->id}}">
    
                  <div class="row">
                    
                      <div class="col">

                        <div class="form-group row">
                          <label for="type" class="col-md-3 col-form-label text-md-right">{{ __('Vous-etes') }}</label>
    
                          <div class="col-md-7 ">
                              <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{$showUser->type}}" autocomplete="type" readonly>
    
                              @error('type')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="nom" class="col-md-3 col-form-label text-md-right">{{ __('Nom') }}</label>
          
                          <div class="col-md-7">
                              <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $showUser->nom}}" required autocomplete="nom" autofocus>
          
                              @error('nom')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
          
          
                      <div class="form-group row">
                          <label for="prenom" class="col-md-3 col-form-label text-md-right">{{ __('Prenom') }}</label>
          
                          <div class="col-md-7">
                              <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ $showUser->prenom}}" required autocomplete="prenom">
          
                              @error('prenom')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="ville" class="col-md-3 col-form-label text-md-right">{{ __('Ville') }}</label>
                          <div class="col-md-7">
                              <select name="ville" id="ville" class="form-control @error('ville') is-invalid @enderror">
                                  @foreach($villes as $item)
          
                                  <option value="{{$showUser->ville}}">{{$item->ville}}</option>
          
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
                          <label for="adresse" class="col-md-3 col-form-label text-md-right">{{ __('Adresse') }}</label>
          
                          <div class="col-md-7">
                              <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ $showUser->adresse}}" required autocomplete="adresse">
          
                              @error('adresse')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
          
                      <div class="form-group row">
                          <label for="region" class="col-md-3 col-form-label text-md-right">{{ __('Région') }}</label>
                          <div class="col-md-7">
                              <select name="region" id="region" class="form-control @error('region') is-invalid @enderror">
                                  @foreach($regions as $item)
          
                                  <option value="{{$showUser->region}}">{{$item->region}}</option>
          
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
                          <label for="domaine" class="col-md-3 col-form-label text-md-right">{{ __('Domaine') }}</label>
                          <!--Fill Select options with domaine names -->
          
                          <div class="col-md-7">
                              <select name="domaine" id="domaine" class="form-control @error('domaine') is-invalid @enderror">
                                  @foreach($domaines as $item)
          
                                  <option value="{{$showUser->domaine}}">{{$item}}</option>
          
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
                        <label for="numeroTele" class="col-md-3 col-form-label text-md-right">{{ __('Numero De Telephone') }}</label>
                        <div class="col-md-7">
                            <input id="numeroTele" type="text" class="form-control @error('numeroTele') is-invalid @enderror" name="numeroTele" value="{{ $showUser->numeroTele}}" required autocomplete="numeroTele">
                            @error('numeroTele')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
          
                      
                         
                      </div>
                      <div class="col pl-0 ml-0">
          
                          <div class="form-group row">
                              <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                              <div class="col-md-7">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $showUser->email}}" required autocomplete="email">
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
          
                         
                          <div class="form-group row">
                              
          
                              <div class="col-md-7">
                                  <input id="password" type="text" class="form-control" name="password"  autocomplete="new-password" hidden>
                              </div>
                          </div>
          

          
                          <div class="form-group row">
                            <label for="postulantCv" class="col-md-3 col-form-label text-md-right">{{ __('CV') }}</label>

                            <div class="col-md-7">
                                
                                <input id="postulantCv" type="file" class="form-control @error('postulantCv') is-invalid @enderror" name="postulantCv"  autocomplete="postulantCv">

                                @error('postulantCv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photoProfil" class="col-md-3 col-form-label text-md-right">{{ __('Votre photo de profil') }}</label>
  
                            
                            <div class="col-md-7">
                                <img src="/assets/profile_pics/{{Auth::user()->photo_profil}}" width="90px" height="90px" alt="" srcset="">
                               
                            </div>
                          </div>

                        <div class="form-group row">
                          <label for="photoProfil" class="col-md-3 col-form-label text-md-right">{{ __('Nouvelle photo de profil') }}</label>

                          <div class="col-md-7">
                           
                              <input id="photoProfil" type="file" class="form-control @error('photoProfil') is-invalid @enderror" name="photoProfil"  autocomplete="photoProfil">

                              @error('photoProfil')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                       </div>

                      <div class="form-group row">
                        <label for="photoProfil" class="col-md-3 col-form-label text-md-right"></label>
                        <div class="col-md-7 mt-5">
                            <button type="submit" class="btn btn-primary btn-block mb-3">
                                {{ __('Modifier') }}
                            </button>
                        </div>
                      </div>


                        

                      </div>
                  </div>
                  
                    
                   
    </form>
                  
                </div>
                </div>
            </div>
       
</div>
@endsection
