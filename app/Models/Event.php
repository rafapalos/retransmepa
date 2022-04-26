<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model {
    use HasFactory;

    protected $table= 'evento';

    //
    protected $fillable = [
        'nombre', 'matricula', 'marca', 'modelo', 'fecha', 'hora'
    ];

    public $timestamps = false;
}
