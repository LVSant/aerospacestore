<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAeronavesTable extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aeronaves', function (Blueprint $table) {
            $table->increments('id');

            $table->string('modelo');
            $table->text('descricao', 400);
            $table->double('valor', 15, 4);
            $table->integer('ano');
            $table->string('link_img')->default('http://epaper2.mid-day.com/images/no_image_thumb.gif');
            $table->string('tipomotor');
            $table->string('numeromotor')->nullable('true');            
            $table->integer('hvoo')->nullable('true');
            $table->char('status')->default('D');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

                    
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
        Schema::drop('aeronaves');
    }
}