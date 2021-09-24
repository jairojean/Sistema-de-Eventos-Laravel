@extends('layouts.main')

@section('title', '{{$event->title}}')

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="img-container" class="col-md-6"> 
            <img src="/img/events/{{$event->image}}" alt="{{$event->title}}"  class="img-fluid">
        </div>

        <div id="info-container" class="col-md-6">
            <h1>{{$event->title}}</h1>
            <p class="event-city">
                <ion-icon name="location-outline"></ion-icon> {{$event->city}} - {{$event->district}}
            </p>
            <p class="event-participantes">
                <ion-icon name="people-outline"> </ion-icon> {{count($event->users)}} Participantes
            </p>
            <p class="event-ower">
                <ion-icon name="star-outline"> </ion-icon> Criado por: {{ $eventOwner['name'] }}
            </p>
            @if(!$hasUserJoin)
            <form action="{{route('event.join',$event->id)}}" method="post">
                @csrf

                <a href="{{route('event.join',$event->id)}}" 
                     id="event-submit"
                     class="btn btn-primary"
                     onclick="event.preventDefault(); 
                     this.closest('form').submit();">
                      Confirmar presença </a>
            </form>
            @else
            <form action="{{route('event.leave', $event->id)}}" method="post">
                        @csrf
                        @method('Delete')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon> Sair do Evento.
                        </button>
                    </form>
            @endif
           

            <h3>O evento conta com: </h3>
            <ul id="items-list">
                @foreach($event->items as $item)
                    <li><ion-icon name="play-outline"></ion-icon> <span>{{$item}}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o Evento</h3>
            <p class="event-description"> {{$event->descrition}}</p>
        </div>
    </div>
</div>


@endsection('content')