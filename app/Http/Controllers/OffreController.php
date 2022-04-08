<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Entreprise;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $entreprise = Entreprise::where("email", Auth::user()->email)->get();
        $offres = Offre::where("entreprise_offre", $entreprise[0]->nom_entreprise)->get();
        return view("offre.listeOffreRecruteur", ["myOffres" => $offres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("offre.create", [
            "domaines" => json_decode(Storage::get("jsonData/domaines.json")),
            "fonctions" => json_decode(Storage::get("jsonData/fonctions.json")),
            "regions" => json_decode(Storage::get("jsonData/regions.json")),
            "typesContrat" => json_decode(Storage::get("jsonData/typesContrat.json")),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "titre" => "required",
            "typeContrat" => "required",
            "contenu_offre" => "required",
            "domaine" => "required",
            "fonction" => "required",
            "region" => "required",
            "salaire" => "required",
            "niveauEtude" => "required"
        ]);
        $offre = new Offre();
        $offre->titre_offre = $request->input("titre");
        $offre->domaine_offre = $request->input("domaine");
        $offre->region_offre = $request->input("region");
        $offre->contrat_offre = $request->input("typeContrat");
        $offre->date_offre = Carbon::now()->toString();
        $offre->salaire_offre = $request->input("salaire");
        $offre->fonction_offre = $request->input("fonction");
        $offre->niveau_etude_offre = $request->input("niveauEtude");
        $offre->contenu_offre = $request->input("contenu_offre");
        $offre->statut = 1;
        $offre->created_at = Carbon::now();

        $recruteurEntreprise = Entreprise::where("email", Auth::user()->email)->get();

        $offre->entreprise_offre = $recruteurEntreprise[0]->nom_entreprise;

        $offre->save();

        return redirect("/offre")->with('success', 'Offre crée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $offre)
    {
        return view("offre.showOffre", ["offre" => $offre]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit(Offre $offre)
    {
        return view("offre.editOffre", [
            "offre" => $offre, "domaines" => json_decode(Storage::get("jsonData/domaines.json")),
            "fonctions" => json_decode(Storage::get("jsonData/fonctions.json")),
            "regions" => json_decode(Storage::get("jsonData/regions.json")),
            "typesContrat" => json_decode(Storage::get("jsonData/typesContrat.json"))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offre $offre)
    {
        $request->validate([
            "titre" => "required",
            "typeContrat" => "required",
            "contenu_offre" => "required",
            "domaine" => "required",
            "fonction" => "required",
            "region" => "required",
            "salaire" => "required",
            "niveauEtude" => "required"
        ]);

        $offre->titre_offre = $request->input("titre");
        $offre->domaine_offre = $request->input("domaine");
        $offre->region_offre = $request->input("region");
        $offre->contrat_offre = $request->input("typeContrat");
        $offre->salaire_offre = $request->input("salaire");
        $offre->fonction_offre = $request->input("fonction");
        $offre->niveau_etude_offre = $request->input("niveauEtude");
        $offre->contenu_offre = $request->input("contenu_offre");

        $offre->save();

        return redirect("/offre")->with('success', 'Votre offre a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offre $offre)
    {
        $offre->delete();
        return redirect("/offre")->with('success', 'Offre supprimer');
    }

    public function getAllOffres(Request $request)
    {
        $info = $request->input("info");
        $offres = "";
        if ($request->input("region") == "all") {
            if ($info == "") {
                $offres = Offre::paginate(2);
            } else {
                $offres = Offre::where("titre_offre", "LIKE", "%" . $info . "%")->paginate(2);
            }
        } else {

            if ($info == "") {
                $offres = Offre::where("region_offre", "LIKE", $request->input("region"))->where("titre_offre", "LIKE", "%" . $info . "%")->paginate(2);
            } else {
                $offres = Offre::where("region_offre", "LIKE", $request->input("region"))->paginate(2);
            }
        }

        return view("offre.listeOffre", ["offres" => $offres, "regions" => json_decode(Storage::get("jsonData/regions.json"))]);
    }
}
