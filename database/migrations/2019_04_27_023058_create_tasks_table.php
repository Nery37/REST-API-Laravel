<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // pra criar uma migration (eu vou manipular o banco só por aqui) vc usa php artisan make:migration NOMEDAMIGRATION, obs: se vc usar o padrão
    //tipo 'create_nomedatabela_table' ele ja cria com os metodos prontos pra vc, se n ele tbm cria mas sem esses metodos.
    // pra dropar e recriar vc usa php artisan migrate:fresh // ja pra voltar a versão anterior php artisan migrate:rollback
    // o "migrate" é pra executar, ja o "migration" é pra criar, vc tem tudo isso na documentação explicado.
    
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('complete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
