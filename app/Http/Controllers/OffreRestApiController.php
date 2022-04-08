<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;

class OffreRestApiController extends Controller
{
    public function getOffres($offre){
        return Offre::findOrFail($offre);
    }
}
