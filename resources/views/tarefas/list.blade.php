@extends('layouts.admin')

@section('title', 'Listagem de Tarefas')

@section('content')
<h1>Listagem</h1>

@if(count($list) > 0)
       <ul>
        @foreach($list as $item)
        <li>{{$item->titulo}}</li>
        @endforeach
    </ul>
        @else
       Dados não encontrados
        @endif
@endsection

