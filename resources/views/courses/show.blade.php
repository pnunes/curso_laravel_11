
@extends('layouts.admin')

@section('content')

<h2>Detalhes do Curso</h2>

<x-alert />

{{-- {{ dd($course) }} --}}
ID : {{ $course->id }}<br>
Nome : {{ $course->name }}<br>
Preço :{{ 'R$ ' . number_format($course->price, 2,',','.') }}<br>
Cadastro : {{ \carbon\carbon::parse($course->created_at)->format('d/m/Y H:i:s') }}<br>
Atualização : {{ \carbon\carbon::parse($course->updated_at)->format('d/m/Y H:i:s') }}
<br><br>

<a href="{{ route('courses.index') }}">Voltar</a>


@endsection

