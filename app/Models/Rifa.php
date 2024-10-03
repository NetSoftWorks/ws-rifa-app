<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rifa extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'rifas';

    protected $fillable = [
        'valor',
        'primera_suerte',
        'segunda_suerte',
        'tercera_suerte',
        'cuarta_suerte',
        'quinta_suerte',
        'sexta_suerte',
        'septima_suerte',
        'cifras',
        'limite',
        'estado'
    ];
}