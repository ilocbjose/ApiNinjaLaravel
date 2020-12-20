<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ninja extends Model
{
	use HasFactory;

	protected $fillable = ['nombre','fecha_registro','rango','informe_habilidades'];

	public function mission(){
        return $this->belongTo(Mission::class);
    }
}