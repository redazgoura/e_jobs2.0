<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Postulant;
use App\Models\Entreprise;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function showRegistrationForm()
    {
        return view('auth.register', [
            "domaines" => json_decode(Storage::get("jsonData/domaines.json")),
            "villes" => json_decode(Storage::get("jsonData/villes.json")),
            "regions" => json_decode(Storage::get("jsonData/regions.json"))
        ]);
    }

    // public function register(Request $request){
    //     return $request->input();
    // }

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $validationArray = [
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'prenom' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'domaine' => ['required', 'string', 'max:255'],
            'numeroTele' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'photoProfil' => ['required']
        ];

        return Validator::make($data, $validationArray);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        ////user photoprofil
        $uploadedFile = $_FILES["photoProfil"]["name"];
        $ext = explode(".", $uploadedFile)[1];

        $newFileName = Str::uuid()->toString() . "." . $ext;
        $fileTmp = $_FILES["photoProfil"]["tmp_name"];
        move_uploaded_file($fileTmp, base_path() . "/public/assets/profile_pics/" . $newFileName);

        if ($data["type"] == "recruteur") {
            $validationArray["nom_entreprise"] = ['required', 'string', 'max:255'];
            $validationArray["ice"] = ['required', 'string', 'max:255'];

            try {

                $entreprise = new Entreprise();
                $entreprise->nom_entreprise = $data["nom_entreprise"];
                $entreprise->ice = $data["ice"];
                $entreprise->email = $data["email"];
                $entreprise->save();

                return User::create([
                    'nom' => $data['nom'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'prenom' => $data['prenom'],
                    'ville' => $data['ville'],
                    'adresse' => $data['adresse'],
                    'region' => $data['region'],
                    'domaine' => $data['domaine'],
                    'numeroTele' => $data['numeroTele'],
                    'type' => $data['type'],
                    'photo_profil' => $newFileName,
                    'disponibilite' => ($data['type'] == 'recruteur') ?  0 : 1,
                ]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } else if ($data["type"] == "postulant") {

            $uploadedFile = $_FILES["postulantCv"]["name"];
            $ext = explode(".", $uploadedFile)[1];

            if ($ext == "pdf") {
                $newFileNameCv = Str::uuid()->toString() . "." . $ext;
                $fileTmp = $_FILES["postulantCv"]["tmp_name"];
                move_uploaded_file($fileTmp, base_path() . "/storage/app/postulants_cvs/" . $newFileNameCv);

                try {
                    $postulant = new Postulant();
                    $postulant->path_cv = $newFileNameCv;
                    $postulant->email = $data["email"];
                    $postulant->save();

                    return User::create([
                        'nom' => $data['nom'],
                        'email' => $data['email'],
                        'password' => Hash::make($data['password']),
                        'prenom' => $data['prenom'],
                        'ville' => $data['ville'],
                        'adresse' => $data['adresse'],
                        'region' => $data['region'],
                        'domaine' => $data['domaine'],
                        'numeroTele' => $data['numeroTele'],
                        'type' => $data['type'],
                        'photo_profil' => $newFileName,
                        'disponibilite' => ($data['type'] == 'recruteur') ?  0 : 1,
                    ]);
                } catch (Exception $ex) {

                    return $ex->getMessage();
                }
            } else {
                throw ValidationException::withMessages(['postulantCv' => 'Only the pdf format is acceptable']);
            }





            // dd($newFileName);

        }
    }
}
