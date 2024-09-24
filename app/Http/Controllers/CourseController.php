<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    // Listar cursos
    public function index(){
        // Pegando todos os registros e colocando em uma variavel $courses
        // Ordenando os registros pelo campo nome
        $courses = Course::orderby('name','ASC')->get();

        // Mostrando os registro por página
        //$courses = Course::paginate(5);

        //Carregando a view com a relação de cursos impresso nela index.blade.php
        return view('courses.index', ['courses'=>$courses]);
    }

    // Visualizar o curso - um unico curso
    public function show(Request $request){

        $course = Course::where('id', $request->course)->first();

        //Carregando a view index.blade.php
        return view('courses.show', ['course' => $course]);
    }

    // Carregar o formulario cadastrar
    public function create(){
        //Carregando a view index.blade.php
        return view('courses.create');
    }

    // Gravar curso na tabela do BD - Os dados vem pelo Request
    public function store(CourseRequest $request){

        //Validar o formulario
        $request->validated();

        // Cadastrar registro no banco de dados
        $course = Course::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        // A inserção e feita começando com o nome da Model::create depois abre uma
        // chave e clchetes e detro deles colo 'nome do campo da tabela que vai receber o valor'
        // seguido do $request->name, com o nome do campo recebido no request
        // Se houver mais campos o processo se repete paa cada um deles

        // Redirecionar o usuario para o mesmo formulario de cadastramento
        return redirect()->route('courses.show', ['course'=>$course->id])->with('success','Curso Cadastrado com sucesso!');
    }

    // Carregar o formulario para alteracao do curso
    public function edit(Course $course){

        //Carregando a view index.blade.php
        return view('courses.edit',['course'=>$course]);
    }

    // Alterar o curso na tabela do BD
    public function update(CourseRequest $request, Course $course){

        //Validar o formulario
        $request->validated();

        // Alterando na tabela
        $course->update([
            'name'=>$request->name,
            'price'=>$request->price,
        ]);
        //Redirecionado depois de alterado
        return redirect()->route('courses.show', ['course'=>$course->id])->with('success','Curso alterado com sucesso!');
    }

    // Excluir o curso
    public function destroy(Course $course){

        $course->delete();

        return redirect()->route('courses.index')->with('success','Curso excluido com sucesso!');
    }
}
