@extends('layouts.main')

@section('title', 'Eventos')

@section('content')

{{--Este é um comentario no blade--}}
<h1>
    <table width="500px" height="500px">
        <tr>
            <th>ID</th>
            <th>Titulo Evento</th>
            <th>descricao</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>Entrada</th>
        </tr>
        @foreach ($events as $e )
        <tr>
            <td>{{ $e->id}}</td>
            <td>{{ $e->title}}</td>
            <td>{{ $e->description}}</td>
            <td>{{ $e->city}}</td>
            <td>{{ $e->district}}</td>
            <td>{{ $e->vip}}</td>
            <td><button type="button" class="btn btn-info"><a href="">Detalhes</a> </button></td>
            <td> <button type="button" class="btn btn-warning"><a href="">Editar </a> </button></td>
        </tr>
        @endforeach
    </table>
</h1>

@endSection