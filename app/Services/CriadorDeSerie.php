<?php


namespace App\Services;


use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{

    public function criandoSerie(

        string $nomeSerie,
        int $qtdTemporadas,
        int $qtdEpisodios): Serie
    {
        $serie = null;

        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie]);
        $this->criaUmaTemporada($qtdTemporadas, $qtdEpisodios, $serie);
        DB::commit();

        return $serie;
    }

    public function criaUmaTemporada(int $qtdTemporadas, int $qtdEpisodios, $serie)
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporada()->create(['numero' => $i]);
            $this->criaUmEpisodio($qtdEpisodios, $temporada);
        }
    }

    public function criaUmEpisodio(int $qtdEpisodios, $temporada): void
    {
        for ($j = 1; $j <= $qtdEpisodios; $j++) {
            $temporada->episodio()->create(['numero' => $j]);
        }
    }
}
