<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Acrescentando a coluna preco na tabela courses, do tipo float.
        // deve ser criada aopos a coluna name com valor padrão de zero
        Schema::table('courses', function(Blueprint $table){
            $table->float('price')->after('name')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Funão para excluir a coluna price da taela, se for necessario
        Schema::table('courses', function(Blueprint $table){
            $table->dropcolumn('price');
        });
    }
};
