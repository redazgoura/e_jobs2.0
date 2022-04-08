<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Offre extends Model
{
    use HasFactory;
    public $table = "offres";
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
}
