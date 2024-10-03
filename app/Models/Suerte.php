<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suerte extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'suertes';

    protected $fillable = [
        'primera_suerte',
        'segunda_suerte',
        'tercera_suerte',
        'cuarta_suerte',
        'quinta_suerte',
        'sexta_suerte',
        'septima_suerte',
        'fecha',
    ];
}
