@extends('layouts/admin')
@section('title', 'Configurações')
@section('cabecalho')
    Olá,
    {{ $nome }} - <a href="/logout">Sair</a>
    <x-alert>
        Dados realizados com sucesso...
    </x-alert>
  <p>Cadastro</p>
Meu nome é: {{$nome}}
Versão: {{$versao}}
@section('content')
<ul>
    @forelse($lista as $item)
    <li>{{$item['ingrediente']}} - {{$item['qt']}}</li>
    @empty
        <p>Itens não encontrados.</p>
    @endforelse
</ul>

@if($showform)
<form method="POST">
    @csrf
    <label>Nome:</label>
    <input type="text" name="nome" /><br />
    <label>Idade</label>
    <input type="text" name="idade" /><br />
    <label>Cidade</label>
    <input type="text" name="cidade" /><br />

    <input type="submit" value="Enviar" /><br />
</form>
@endif
@endsection

