<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'id','libelle', 'description', 'date_debut','date_fin','status','type_de_projet','user_id',
    ];
}
