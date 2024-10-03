<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'tickets';

    protected $fillable = [
        'rifa_id',
        'usuario_id',
        'codigo',
        'numero',
        'fecha_venta',
    ];

    public function rifa() {
        return $this->belongsTo(Rifa::class, 'rifa_id', 'id');
    }

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }
}
