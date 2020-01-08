<?php


namespace App\Services;


use App\Episodio;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class RemovendoSerie
{

    public function removeUmaSerie(int $serieId): String
    {
        $nomeSerie = '';

        DB::transaction(function () use ($serieId, &$nomeSerie) {

            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;

            $this->removeTemporadas($serie);
            $serie->delete();
        });
        return $nomeSerie;
    }

    /**
     * @param $serie
     */
    public function removeTemporadas(Serie $serie): void
    {
        $serie->temporada->each(function (Temporada $temporada) {
            $this->removeEpisodios($temporada);
            $temporada->delete();
        });
    }

    public function removeEpisodios(Temporada $temporada): void
    {
        $temporada->episodio()->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}
