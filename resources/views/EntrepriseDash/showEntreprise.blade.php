@extends('layouts.app')
@section('content')


<div class="preloader">
  <div class="lds-ripple">
    <div class="lds-pos"></div>
    <div class="lds-pos"></div>
  </div>
</div>

 <div class="w3-sidebar w3-light-grey w3-bar-block bg-dark " style="width:20%">
    <div class="row justify-content-center">
      <h3 class="text-center text-white my-5">Menu</h3>
    </div>
    <a href="/EntrepriseDash/{{ Auth::user()->id }}" class="w3-bar-item w3-button text-white">Dashboard</a>
    <a href="/EntrepriseDash/{{ $showUserEntreprise->id }}/edit" class="w3-bar-item w3-button text-white">Profile</a>
    <a href="/offre/create" class="w3-bar-item w3-button text-white">Poster une offre</a>
    <a href="/offre" class="w3-bar-item w3-button text-white">Voir mes offres</a>
    <a href="/candidatures" class="w3-bar-item w3-button text-white">Voir mes candidatures</a>

  </div>
  
  <!-- Page Content -->
  <div style="margin-left:20%">
  
    @include('includes.messages')
  
  
  
   
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
          </div>
          <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
              <ol class="breadcrumb ms-auto">
                <li></li>
              </ol>
              {{-- <a href="https://www.wrappixel.com/templates/ampleadmin/" target="_blank"
                class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Actualiser</a> --}}
            </div>
          </div>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Three charts -->
        <!-- ============================================================== -->
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
              <h3 class="box-title">Candidats</h3>
              <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                  <div id="sparklinedash"><canvas width="67" height="30"
                      style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                  </div>
                </li>
                <li class="ms-auto"><span class="counter text-success">{{$candidatures->count()}}</span></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
              <h3 class="box-title">Offres</h3>
              <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                  <div id="sparklinedash2"><canvas width="67" height="30"
                      style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                  </div>
                </li>
                <li class="ms-auto"><span class="counter text-purple">{{ $offres->count() }}</span></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
              <h3 class="box-title">Recruteurs</h3>
              <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                  <div id="sparklinedash3"><canvas width="67" height="30"
                      style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                  </div>
                </li>
                <li class="ms-auto"><span class="counter text-info">{{ $showUserEntreprise->count() }}</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- PRODUCTS YEARLY SALES -->
        <!-- ============================================================== -->
  
        <!-- ============================================================== -->
        <!-- RECENT SALES -->
        <!-- ============================================================== -->
  
        <!-- ============================================================== -->
        <!-- Recent Comments -->
        <!-- ============================================================== -->
        <div class="row">
          <!-- .col -->
          <div class="col-md-8">
            <div class="p-0">
              <div class="d-flex flex-row comment-row  border-bottom white-box mb-4">
                <div class="comment-text ps-2 ps-md-3 w-100 ">

                  <h3 class="mb-0">Listes des Offres</h3>

                </div>
              </div>
                
            
              <div class="comment-widgets">
                <!-- Comment Row -->
          
                @foreach ($infoCandidatures as $info) 

                 @if (@isset($info))

                 <a href="/offre/{{$info["infoOffre"][0]->id}}" class="text-decoration-none">
                  
                  <div class="d-flex flex-row comment-row  border white-box">
                    <div class="comment-text ps-2 ps-md-3 w-100">
                      {{-- <h5 class="font-medium">{{$info["infoOffre"][0]->titre_offre}}</h5> --}}
                      <span class="mb-3 fs-4 d-block text-body">{{ $info["infoOffre"][0]->titre_offre}}</span>
                      <div class="comment-footer d-md-flex align-items-center">
    
                        <span class="badge fs-6 rounded bg-danger">{{ $info["infoOffre"][0]->contenu_offre}}</span>
    
                        <div class="text-muted fs-6 ms-auto mt-2 mt-md-0">{{ \Carbon\Carbon::parse($info["infoOffre"][0]->created_at)->diffForHumans() }}</div>
                      </div>
                    </div>
                  </div>

                </a>

                  @endif
                @endforeach 
                
               

              </div>
            </div>
          </div>
         {{-- CHAT LISTING SECTION --}}
         <div class="col-md-4 ">
          <div class="p-0">
            <div class="d-flex flex-row comment-row  border-bottom white-box mb-4">
              <div class="comment-text ps-2 ps-md-3 w-100 ">

                <h3 class="mb-0">Listes des Candidats</h3>

              </div>
            </div>
            
              @foreach ($infoCandidatures as $info) 

              @if (@isset($info))
              
             
              <div class="comment-widgets">
                <a href="/voirCandidatCv/{{$info["infoCandidat"][0]->path_cv}}" class="text-decoration-none" target="_blank">
                 
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row  white-box border">
                      <div class="p-0"><img src="/assets/profile_pics/{{ $info["infoUser"][0]->photo_profil }}" alt="user" width="50"
                              class="rounded-circle"></div>
                      <div class="comment-text ps-2 ps-md-3 w-100">
                          <h5 class="font-medium text-dark">{{ $info["infoUser"][0]->nom ." ".$info["infoUser"][0]->prenom}}</h5>
                          <span class="mb-0 d-block text-dark">{{ $info["infoUser"][0]->email }}</span>
                          <div class="comment-footer d-md-flex align-items-center">
                              <div class="text-muted fs-6 ms-auto my-0 py-0">{{ $info["datePostulation"] }}</div>
                          </div>
                      </div>
                  </div>
                </a>
              </div>

              @endif
              @endforeach 
          </div>
      </div>
        


     
          <!-- /.col -->
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
    </div>
  </div>
  

  
    
   <script>
     function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}
   </script>

 
@endsection
