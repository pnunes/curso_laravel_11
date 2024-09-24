@extends('layouts.admin')

@section('content')

<h2>Listar os Cursos</h2>

<x-alert />

<a href="{{ route('courses.create') }}">
    <button type="button">Cadastrar</button>
</a><br><br>

{{-- impriminso os registros da tabela course --}}
@forelse ($courses as $course)
    ID :{{ $course->id }}<br>
    Nome :{{ $course->name }}<br>
    Preço :{{ 'R$ ' . number_format($course->price, 2,',','.') }}<br>
    Cadastro :{{ \carbon\carbon::parse($course->created_at)->format('d/m/Y H:i:s') }}<br>
    Atualização : {{ \carbon\carbon::parse($course->updated_at)->format('d/m/Y H:i:s') }}<br><br>

    <a href="{{ route('courses.show',['course'=>$course->id]) }}">
        <button type="button">Visualizar</button>
    </a><br><br>
    <a href="{{ route('courses.edit',['course'=>$course->id]) }}">
        <button type="button">Alterar</button>
    </a><br><br>
    <form action="{{ route('courses.destroy',['course'=>$course->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza que quer excluir o registros ?')">Apagar</button>
    </form>
    <hr>

@empty
    <p style="color:#f00">Nenhum curso encontrado!</p>
@endforelse

{{-- Imprimindo o numero da pagina com o total de paginas --}}
{{-- {{ $courses->links() }} --}}
@endsection

