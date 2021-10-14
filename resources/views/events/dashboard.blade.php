@extends('layouts.main')

@section('title')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $e)
            <tr>
                <td scropt="row">{{($loop->index +1)}}</td>
                <td><a href="{{ route('event.show',$e->id ) }} ">{{$e->title}}</a></td>
                <td>{{ count($e->users)}}</td>
                <td>
                    <a href="{{route('event.edit',$e->id)}}" class="btn btn-info edit-btn">
                        <ion-icon name="create-outline"></ion-icon> Editar
                    </a>
                    <form action="{{route('event.delete', $e->id)}}" method="post">
                        @csrf
                        @method('Delete')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon> Deletar
                        </button>
                    </form>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>{{$e->name}}</p>
    @else
    <p>Vocé ainda não possui eventos.</p> <a href="{{route('event.create')}}"> Criar evento.</a>
    @endif
</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que participo</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($eventAsParticipant) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventAsParticipant as $e)
            <tr>
                <td scropt="row">{{($loop->index +1)}}</td>
                <td><a href="{{ route('event.show',$e->id ) }} ">{{$e->title}}</a></td>
                <td>{{ count($e->users)}}</td>
                <td>
                        <form action="{{route('event.leave', $e->id)}}" method="post">
                            @csrf
                            @method('Delete')
                            <button type="submit" class="btn btn-danger ">
                                <ion-icon name="trash-outline"></ion-icon> Sair do Evento.
                            </button>
                        </form>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Vocé ainda não está participando de nenhum evento. </p> <a href="/"> Veja os eventos.</a>
    @endif
</div>

@endsection