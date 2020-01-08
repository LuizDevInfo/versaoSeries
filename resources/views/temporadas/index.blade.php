@extends('layout')

@section('cabecalho')
    <h1>Temporadas de {{$serie->nome}}</h1>
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodios.index')}}">
                    Temporada {{ $temporada->numero }}
                </a>
{{--                <span class="badge badge-secondary">--}}
{{--                    0/ {{$temporada->episodio}}--}}
{{--                </span>--}}
            </li>
        @endforeach
    </ul>

@endsection
