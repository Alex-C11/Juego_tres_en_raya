<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;
    protected $table = 'resultados';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nombre_partida', 'nombre_jugador1',
        'nombre_jugador2','ganador','punto','estado'
    ];

    public function resultados()
    {
        return $this->hasMany(Resultado::class);
    }
}
