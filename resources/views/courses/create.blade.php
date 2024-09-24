
@extends('layouts.admin')

@section('content')

<h2>Cadastrar Curso</h2>

<x-alert />

<form action="{{ route('courses.store') }}" method="POST">
    @csrf
    @method('POST')
    <label>Nome :</label>
    {{-- value e para caso nao seja digitado um novo curso ele mantem o ultimo digitado --}}
    <input type="text" name="name" id="name" placeholder="Nomedo curso"
    value="{{ old('name') }}" ><br><br>
    <label>Valor R$ :</label>
    <input type="text" name="price" id="price" placeholder="Valor curso"
    value="{{ old('price') }}" ><br><br>
    <button type="submit" name="bt_gravar">Cadastrar</button><br><br>
</form>
<a href="{{ route('courses.index') }}">Voltar</a><br>
@endsection

