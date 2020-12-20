<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mision extends Model
{
    use HasFactory;

    protected $fillable = ['id_cliente','recompensa','ninjas_estimados','pago','estado','urgente'];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function ninjas(){
        return $this->hasMany(Ninja::class);
    }
}
