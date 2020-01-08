<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    protected $fillable = ['numero','temporadas_id'];

    public $timestamps = false;

    public function temporadas(){
        return $this->belongsTo(Temporada::class);
    }
}
