@extends('layout')
@section('cabecalho')
    Episódios
@endsection

@section('conteudo')

    <form action="">
        @foreach($episodios as $episodio)
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episodios {{$episodio}}
                </li>
            </ul>
        @endforeach
            <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
@endsection
