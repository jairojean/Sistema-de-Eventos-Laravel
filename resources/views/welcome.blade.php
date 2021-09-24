@extends('layouts.main')

@section('title', 'EnventosLocais')

@section('content')

{{--Este é um comentario no blade--}}
<div id="search-container" class="col-md-12">
    <h1>Encontrar Evento</h1>
    <form action="/" method="GET">
        @csrf
        <input type="text" id="search" name="search" class="form-control" placeholder="Buscar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2> Buscando por : {{$search}}</h2>
    @else
    <h2>Proximos Eventos</h2>
    <p id="subtitle"> Veja os eventos terão por aí.</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($events as $e)
        <div class="card col-md-3">
        <img src="/img/events/{{$e->image}}" alt="{{$e->title}}">
            <div class="card-body">
                <p class="card-date"> {{ date('d/m/y'), strtotime($e->date) }}</p>
                <h5 class="card-title"> {{ $e->title }}</h5>
                <p class="card-participants">{{count($e->users)}} Participantes</p>
                <a href="{{route('event.show', $e->id) }}" class="btn btn-primary">Saber mais</a>
               
            </div>
        </div>
        
        @endforeach
        @if(count($events) == 0 && $search)
        <p><strong> {{$search}}</strong> não encontrado! <a href="/"> Ver Todos</a> </p>
        @elseif(count($events) == 0)
        <p>Não há eventos disponiveis</p>
        @endif
    </div>
</div>

@endSection