@extends('layout')

@section('cabecalho')
    <h1>Adicionar Séries</h1>
@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post">
        @csrf

        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome">

            </div>

            <div class="col col-2">
                <label for="qtd_temporadas">Nº de temporadas </label>
                <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
            </div>

            <div class="col col-2">
                <label for="qtd_episodios">Ep. Temporada</label>
                <input type="number" class="form-control" name="qtd_episodios" id="qtd_episodios">
            </div>
        </div>
        <button class="btn btn-primary mt-3 mb-4 ">Adicionar</button>
    </form>
@endsection
