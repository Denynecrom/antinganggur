<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

        public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->string('role');
            $table->string('name', 50);
            $table->enum('gender', ['Laki-Laki', 'Perempuan']);
            $table->string('phone', 15);
            $table->text('address');
            $table->date('birthdate');
            $table->string('email', 50)->unique();
            $table->string('email_verified_at', 50)->nullable();
            $table->string('password', 70);
            $table->string('photo');
            $table->string('resume', 57);
            $table->string('cv', 53);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
