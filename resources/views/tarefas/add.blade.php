@extends('layouts/admin')
@section('title', 'Adicionar')
@section('content')
    <h1>Adicionar</h1>
  <!--//*@if(session('warning'))
       <x-alert>
    //    {{session('warning')}}
        </x-endalert>
    @endif -->
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert>
                {{ $error }}<br />
            </x-alert>
        @endforeach
    @endif

    <form method="POST">
        @csrf
        <label>Título:</label><br />
        <input type="text" name="titulo"><br />
        <input type="submit" value="Adicionar"><br />
    </form>
@endsection
