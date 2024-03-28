<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rib extends Model
{
    use HasFactory;
    //protected $fillable = ;On cite toutes les colonnes
    protected $guarded =[]; //inserer toutes les valeurs sauf celles du tableau
}
