<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('email', 50)->unique();
            $table->string('no_hp', 15);
            $table->text('keahlian');
            $table->text('pendidikan');
            $table->integer('gaji');
            $table->string('photo');
            $table->text('description');
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
        Schema::dropIfExists('magangs');
    }
}
