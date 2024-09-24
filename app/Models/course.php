<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    //Indicar o nome da tabela
    protected $table = 'courses';

    // informar os campos da tabela que serão preenchidos pelo usuario
    //protected fillable = ['name','cpf','email']

    protected $fillable = ['name','price'];
}
