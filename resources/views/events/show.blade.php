@extends('layouts.main')

@section('title', '{{$event->title}}')

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="img-container" class="col-md-6">
            <img src="/img/show1.jpg" class="img-fluid" alt="{{$event->title}}">
        </div>

        <div id="info-container" class="col-md-6">
            <h1>{{$event->title}}</h1>
            <p class="event-city">
                <ion-icon name="location-outline"></ion-icon> {{$event->city}}
            </p>
            <p class="event-participantes">
                <ion-icon name="people-outline"> </ion-icon> X Participantes
            </p>
            <p class="event-ower">
                <ion-icon name="star-outline"> </ion-icon> Dono do Evento
            </p>
            <a href="" class="btn btn-primary" id="event-submit"> Confirmar presença</a>
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