<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // protected $fillable: Questa proprietà è fondamentale per la "Mass Assignment Protection" di Laravel.
    // Specifica gli attributi che possono essere assegnati massivamente.
    protected $fillable = ['name', 'pages', 'year', 'image'];
}
