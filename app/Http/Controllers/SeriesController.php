<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerieFormRequest;
use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovendoSerie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();

        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));

    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SerieFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {

        $serie = $criadorDeSerie->criandoSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->qtd_episodios
        );

        $request->session()->flash('mensagem', "Série {$serie->nome} com suas temporadas e episodios criadas com sucesso.");

        return redirect()->route('listando-series-adicionadas');
    }

    public function delete(Request $request, RemovendoSerie $removendoSerie)
    {

        $deletandoSerie = $removendoSerie->removeUmaSerie($request->id);

        $request->session()->flash('mensagem', "Série $deletandoSerie removida com sucesso.");

        return redirect()->route('listando-series-adicionadas');
    }

    public function editaNome($id, Request $request){

        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();

    }
}
