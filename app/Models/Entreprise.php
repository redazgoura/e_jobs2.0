<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;
    public $table = "entreprises";
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = false;
}
