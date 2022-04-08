<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Entreprise;
use App\Models\Offre;
use App\Models\Postulant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class CandidatureController extends Controller
{

    public function index()
    {
        $entreprise = Entreprise::where("email", "=", Auth::user()->email)->get()[0]->nom_entreprise;

        $offres = Offre::where("entreprise_offre", "=", $entreprise)->pluck("id");

        $candidatures = Candidature::whereIn("id_offre", $offres)->get();

        $infoCandidatures = [];

        foreach ($candidatures as $candidature) {
            Carbon::setLocale('fr');
            array_push($infoCandidatures, [
                "infoOffre" => Offre::where("id", "=", $candidature->id_offre)->get(),
                "infoCandidat" => Postulant::where("id", "=", $candidature->id_postulant)->get(),
                "infoUser" => User::where("email", "=", Postulant::where("id", "=", $candidature->id_postulant)->get()[0]->email)->get(),
                "datePostulation" => Carbon::createFromTimeStamp(strtotime($candidature->date_postulation))->diffForHumans()
            ]);
        }

        return view("candidature.index", ["infoCandidatures" => $infoCandidatures]);
    }

    public function store($id)
    {

        $candidature = new Candidature();
        $candidature->id_postulant =  Postulant::where("email", "=", Auth::user()->email)->get()[0]->id;
        $candidature->id_offre = intval($id);
        $candidature->date_postulation = Carbon::now();
        $candidature->save();
        return redirect()->back();
    }

    public function sendCv($cv)
    {

        $pdfContent = Storage::get("postulants_cvs/$cv");
        $type       = Storage::mimeType("postulants_cvs/$cv");

        return Response::make($pdfContent, 200, [
            'Content-Type'        => $type,
            'Content-Disposition' => "inline; filename='$cv'"
        ]);
    }
}
