<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    protected $fillable = ['id', 'numero', 'serie_id'];

    public $timestamps = false;

    public function episodio()
    {
        return $this->hasMany(Episodio::class);
    }

    public function episodios(){

        return $this->hasMany(Episodio::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
