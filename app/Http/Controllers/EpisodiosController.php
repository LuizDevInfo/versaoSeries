<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Temporada;
use phpDocumentor\Reflection\Types\Integer;

class EpisodiosController extends Controller
{

    public function index(Temporada $temporada)
    {
        $episodios = $temporada->episodios;

//      $tpEp = $temporada->episodio->all($temporada);
//        $eps = Temporada::where('numero',1)->get();

//        $listaEpisodio = $eps->numero;
////      $IdTp = Temporada::find($id);
////      $temporadas = $IdTp->episodio()->get('numero');

        return view('episodios.index',compact('episodios','eps'));
    }
}
