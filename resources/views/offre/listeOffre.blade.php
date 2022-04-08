@extends('layouts.app')
@section('content')
    
<div class="container">

    <div class="container  my-3">   
      <div class="row d-flex justify-content-center">
        <div class="col-md-10 mb-2 mt-4">

           
            
              <div class="row">
                <div class="col-md-4">
                  

                 <form action="/listesdesoffres" action="GET">

                <div class="form-group">
                          <input type="text" class="form-control p-2 border-dark" name="info" placeholder="Intitulé de poste/entreprise">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                          <select name="region" id="ville" class="form-control border-dark p-2">
                            <option selected value="all"><strong>Ou?</strong></option>
                            @foreach($regions as $region)

                            <option value="{{$region->region}}">{{$region->region}}</option>

                            @endforeach


                          </select> 
                    </div>
                </div>

                <div class="col-md-4">

                    <button type="submit" class="btn btn-primary btn-block p-2">Lancer La Recherche</button>

                </div>


                 </form>
              
            </div>
            
      
</section>


  <div class="row  mt-3">
   

          <div class="col-5 mb-3 w-50 ">

              @foreach ($offres as $offre)
              <div class="card text-center ">
                <div class="card-body p-2 ">
                  <h6 class="card-title">{{$offre->titre_offre}}</h6>
                  <p class="card-text text-truncate">{{$offre->contenu_offre}}</p>
                  <a href="#" class="btn btn-primary mb-1 seeMoreLink" id="{{$offre->id}}">Voir Plus</a>
                </div>
              <div class="text-dark text-center p-0">
                {{ \Carbon\Carbon::parse($offre->date_offre)->diffForHumans()}}
              </div>
              </div><br class="my-2">
              @endforeach

              {{$offres->links("pagination::bootstrap-4")}}

          </div>
          <div class="col-7">
              <div class="card p-3 position-sticky" style="display: none;" id="offreDetailsContainer">  
                  <div class="cord-body">
                    <h4>plus de details sur l'annonce </h4>
                    <div><small><strong>Titre</strong></small><p id="offreTitre"></p></div>
                    <div>
                      <small><strong>Salaire en Dhs</strong></small>
                      <p id="offreSalaire"></p>
                    </div>
                    <div>
                      <small><strong>Déscription</strong></small>
                      <p id="offreDescription"></p>
                    </div>
                    <div>
                      <small><strong>Entreprise</strong></small>
                      <p id="offreEntreprise"></p>
                    </div>
                    <div>
                      <small><strong>Région</strong></small>
                      <p id="offreRegion"></p>
                    </div>
                    <div>
                      <small><strong>Niveau d'étude requis</strong></small>
                      <p id="offreNiveauEtude"></p>
                    </div>
                    <div>
                      <small><strong>Fonction</strong></small>
                      <p id="offreFonction"></p>
                    </div>
                    <div>
                      <small><strong>Domaine</strong></small>
                      <p id="offreDomaine"></p>
                    </div>
                    <div>
                      <small><strong>Date</strong></small>
                      <p id="offreDate"></p>
                    </div>
                  </div>
                  @if (Auth::user())
                    @if (Auth::user()->type == "postulant")
                    <a href="#" id="btnCandidature" class="btn btn-primary ml-5 w-50" id="offreBtn" style="display:none;">Postuler</a>
                    <span class="alert alert-danger d-block w-100" id="expireBlock" style="visibility:hidden;">Cette offre est expirée</span>
                    @endif
                  @endif
              </div>

          </div>
            
  </div>
 

   </div>

</div>


<script>
  let seeMoreLinks = document.querySelectorAll(".seeMoreLink");
  let offreDetailsContainer = document.getElementById("offreDetailsContainer");
  let offreTitre = document.getElementById("offreTitre")
  let offreSalaire = document.getElementById("offreSalaire");
  let offreDescription = document.getElementById("offreDescription");
  let offreEntreprise = document.getElementById("offreEntreprise");
  let offreRegion = document.getElementById("offreRegion");
  let offreNiveauEtude = document.getElementById("offreNiveauEtude");
  let offreFonction = document.getElementById("offreFonction");
  let offreDomaine = document.getElementById("offreDomaine");
  let offreDate = document.getElementById("offreDate");
  let btnCandidature = document.getElementById("btnCandidature");
  let expireBlock = document.getElementById("expireBlock");

  seeMoreLinks.forEach((item, index)=>{
    item.onclick = ()=>{
      fetch("http://localhost:8000/api/get/offre/"+item.id).then((response)=>{
        return response.json();
      }).then((data)=>{
        if(data.statut == 1){
          if(btnCandidature !== null){
            btnCandidature.style.display = "block";
          expireBlock.style.visibility = "hidden";
          }
          
        }else{
          if(btnCandidature !== null){
            btnCandidature.style.display = "none";
          expireBlock.style.visibility = "visible";
          }
          
        }
        if(btnCandidature !== null){
          btnCandidature.setAttribute("href",`http://localhost:8000/candidater/${data.id}`);
        }
        offreDetailsContainer.style.display = "block";
        offreDescription.style.display = "block";
        offreDescription.innerText = data.contenu_offre;
        offreTitre.innerText = data.titre_offre;
        offreSalaire.innerText = data.salaire_offre;
        offreEntreprise.innerText = data.entreprise_offre;
        offreRegion.innerText = data.region_offre;
        offreNiveauEtude.innerText = data.region_offre;
        offreFonction.innerText = data.fonction_offre;
        offreDomaine.innerText = data.domaine_offre;
        offreDate.innerText = data.date_offre;
      }).catch((error)=>{
        console.log(error)
      })
    }
  });
</script>


@endsection