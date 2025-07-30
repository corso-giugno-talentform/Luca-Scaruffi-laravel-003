<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Specifica i campi che possono essere assegnati massivamente
    protected $fillable = ['name', 'pages', 'year'];
}
