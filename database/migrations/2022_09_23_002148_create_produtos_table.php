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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100)->unique();
            $table->double('preco', [10,2]);
            $table->string('image')->nullable();
            $table->text('descricao')->nullable();
            $table->timestamps();
        });

        Schema::create('categoria_produto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->foreignId('produto_id')->constrained('produtos');
        });

        Schema::create('ingrediente_produto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ingrediente_id')->constrained('ingredientes');
            $table->foreignId('produto_id')->constrained('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingrediente_produto');
        Schema::dropIfExists('categoria_produto');
        Schema::dropIfExists('produtos');
    }
};
