<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'numero_employe',
        'nom',
        'prenom',
        'tel',
        'adresse',
        'date_naissance',
        'date_embauche',
        'poste',
        'salaire'
    ];
}
