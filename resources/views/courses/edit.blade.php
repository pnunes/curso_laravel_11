@extends('layouts.admin')

@section('content')

<h2>Editar Curso</h2>

<x-alert />

<form action="{{ route('courses.update',['course'=>$course->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nome :</label>
    <input type="text" name="name" id="name" placeholder="Nome do curso"
    value="{{ old('name',$course->name) }}"><br><br>
    <label>Preço :</label>
    <input type="text" name="price" id="price" placeholder="Valor do curso"
    value="{{ old('price',$course->price) }}"><br><br>

    <button type="submit" name="bt_gravar">Alterar</button><br><br>
</form>

<a href="{{ route('courses.index') }}">Voltar</a><br>

@endsection
