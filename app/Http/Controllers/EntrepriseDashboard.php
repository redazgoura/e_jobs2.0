<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Offre;
use App\Models\Postulant;
use App\Models\Entreprise;
use App\Models\Candidature;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

class EntrepriseDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $showUserEntreprise = Entreprise::leftJoin('users', 'users.email', '=', 'entreprises.email')
            ->get()->find($id);

        $entreprise = Entreprise::where("email", "=", Auth::user()->email)->get()[0]->nom_entreprise;

        $offres = Offre::where("entreprise_offre", "=", $entreprise)->get()->pluck("id");

        //dd($offres);

        $candidatures = Candidature::whereIn("id_offre", $offres)->get();

        //dd($candidats);



        //


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

        //return $infoCandidatures;


        return view('EntrepriseDash.showEntreprise', [
            'showUserEntreprise' => $showUserEntreprise,
            "offres" => $offres,
            "candidatures" => $candidatures,
            'infoCandidatures' => $infoCandidatures
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $showUserEntreprise = Entreprise::leftJoin('users', 'users.email', '=', 'entreprises.email')
            ->get()->find($id);

        return view('EntrepriseDash.entrepriseDash', [
            "domaines" => json_decode(Storage::get("jsonData/domaines.json")),
            "villes" => json_decode(Storage::get("jsonData/villes.json")),
            "regions" => json_decode(Storage::get("jsonData/regions.json"))

        ])->with('showUserEntreprise',  $showUserEntreprise);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->input();
        try {
            $this->validate($request, [

                'nom' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string', 'max:255'],
                'ville' => ['required', 'string', 'max:255'],
                'adresse' => ['required', 'string', 'max:255'],
                'region' => ['required', 'string', 'max:255'],
                'domaine' => ['required', 'string', 'max:255'],
                'numeroTele' => ['required', 'string', 'max:255'],
                'type' => ['required', 'string', 'max:255'],

            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }


        if (!empty($_FILES["photoProfil"]["name"])) {
            $uploadedFile = $_FILES["photoProfil"]["name"];
            $ext = explode(".", $uploadedFile)[1];

            $newFileName = Str::uuid()->toString() . "." . $ext;
            $fileTmp = $_FILES["photoProfil"]["tmp_name"];
            move_uploaded_file($fileTmp, base_path() . "/public/assets/profile_pics/" . $newFileName);
        } else {
            $user = User::find($id);
            $newFileName = $user->photo_profil;
        }



        $entreprise = Entreprise::leftJoin('users', 'users.email', '=', 'entreprises.email')
            ->get()->find($id);
        $entreprise->email = $request->input('email');
        $entreprise->ice = $request->input('ice');
        $entreprise->nom_entreprise = $request->input('nom_entreprise');

        $entreprise->save();

        $user = User::find($id);
        $user->nom = $request->input('nom');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->prenom = $request->input('prenom');
        $user->ville = $request->input('ville');
        $user->adresse = $request->input('adresse');
        $user->region = $request->input('region');
        $user->domaine = $request->input('domaine');
        $user->numeroTele = $request->input('numeroTele');
        $user->type = $request->input('type');
        $user->disponibilite = 0;
        $user->photo_profil = $newFileName;
        $user->save();




        return redirect("EntrepriseDash/" . Auth::user()->id)->with('success', "Vos données sont modifiés");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showCv($cv)
    {

        $pdfContent = Storage::get("postulants_cvs/$cv");
        $type       = Storage::mimeType("postulants_cvs/$cv");

        return Response::make($pdfContent, 200, [
            'Content-Type'        => $type,
            'Content-Disposition' => "inline; filename='$cv'"
        ]);
    }
}
