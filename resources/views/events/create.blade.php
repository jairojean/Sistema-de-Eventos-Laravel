@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')


<div id="event-create container" class="col-md-6 offset-md-3">
    <h1>Criar evento</h1>
    <form action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title"> Evento:</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Nome evento">

        </div>
        <div class="form-group">
            <label for="discrition"> Descrição:</label>
            <textarea name="descrition" id="descrition"></textarea>
        </div>
        <div class="form-group">
            <label for="date"> Data do evento:</label>
           <input type="date" class="form-control" id="date" name="date">
        </div>

        <div class="form-group">
            <label for="discrition"> Cidade:</label>
            <input type="text" class="form-control" name="city" id="city">
        </div>

        <div class="form-group">
            <label for="discrition"> Bairro:</label>
            <input type="text" class="form-control" name="district" id="district">
        </div>

        <div class="form-group">
            <label for="discrition">o envento é gratuito?</label>
            <select name="vip" id="vip" class="form-control">
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
        </div>

        <div class="form-group">
            <label for="title"> Adicione items de Infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco"> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Musica ao vivo"> Musica ao vivo
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open food"> Open food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open bar"> Open bar
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Sorteio"> Sorteio
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes"> Brindes
            </div>

        </div>

        <div class="form-group">
            <label for="image">imagem do evento:</label>
            <input type="file" id="image " name="image" class="from-control-file">
        </div>

        <button type="subimit" class="btn btn-primary">Salvar</button>
    </form>

</div>

@endsection('content')