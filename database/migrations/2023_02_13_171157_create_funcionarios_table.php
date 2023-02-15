<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('endereco_id')->constrained('enderecos');
            $table->foreignId('unidade_id')->constrained('unidades');
            $table->string('nome', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('idade', 50)->nullable();
            $table->string('documento', 50)->nullable();
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
        Schema::dropIfExists('funcionarios');
    }
};
