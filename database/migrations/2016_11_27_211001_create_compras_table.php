<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('id_comprador');
            $table->unsignedInteger('id_vendedor');
            $table->unsignedInteger('id_aeronave');
            $table->char('status');
            $table->text('mensagem', 400);
            
            $table->foreign('id_comprador')->references('id')->on('users');
            $table->foreign('id_vendedor')->references('id')->on('users');
            $table->foreign('id_aeronave')->references('id')->on('aeronaves');

                    
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
        Schema::drop('compras');
    }
}
