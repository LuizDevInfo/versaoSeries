<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Temporada;

class TemporadasController extends Controller
{
    public function index(int $serieId)
    {
        $serie = Serie::find($serieId);
        $temporadas = $serie->temporada;

        return view('temporadas.index', compact('serie', 'temporadas'));
    }

}
