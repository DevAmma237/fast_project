<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $table = 'tache';
    public $timestamps = true;

    protected $fillable = [
        'id', 'libelle', 'description', 'date_debut', 'date_fin', 'status', 'language', 'project_id', 'couche'
    ];
}
