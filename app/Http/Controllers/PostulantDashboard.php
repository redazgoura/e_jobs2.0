<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offre;
use App\Models\Postulant;
use App\Models\Entreprise;
use App\Models\Candidature;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\throwException;
use Illuminate\Validation\ValidationException;

class PostulantDashboard extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {


        $showUser = Postulant::rightJoin('users', 'users.email', '=', 'postulants.email')
            ->get()->find($id);


        return view('Dashboard.showPostulant')->with('showUser', $showUser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $showUser = Postulant::rightJoin('users', 'users.email', '=', 'postulants.email')
            ->get()->find($id);


        return view('Dashboard.postulantDash', [
            "domaines" => json_decode(Storage::get("jsonData/domaines.json")),
            "villes" => json_decode(Storage::get("jsonData/villes.json")),
            "regions" => json_decode(Storage::get("jsonData/regions.json"))

        ])->with('showUser',  $showUser);
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

        //Validate a user

        ///////////////////////////
        if (!empty($_FILES["postulantCv"]["name"])) {
            $uploadedFile = $_FILES["postulantCv"]["name"];
            $ext = explode(".", $uploadedFile)[1];

            if ($ext != "pdf") {

                throw ValidationException::withMessages(['postulantCv' => 'Only the pdf format is acceptable']);
            } else {

                $newFileNameCv = Str::uuid()->toString() . "." . $ext;
                $fileTmp = $_FILES["postulantCv"]["tmp_name"];
                move_uploaded_file($fileTmp, base_path() . "/storage/app/postulants_cvs/" . $newFileNameCv);

                $postulant = Postulant::where("email", "=", Auth::user()->email)->first();
                $postulant->email = $request->input('email');
                $postulant->path_cv = $newFileNameCv;
                $postulant->save();

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
                $user->disponibilite = 1;
                $user->photo_profil = $newFileName;
                $user->save();
            }
        } else {
            $postulant = Postulant::where("email", "=", Auth::user()->email)->first();
            $oldCv = $postulant->path_cv;
            $postulant->path_cv = $oldCv;
            $postulant->save();

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
            $user->disponibilite = 1;
            $user->photo_profil = $newFileName;
            $user->save();
        }

        return redirect("Dashboard/" . $user->id)->with('success', "Vos données sont modifiés");
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
