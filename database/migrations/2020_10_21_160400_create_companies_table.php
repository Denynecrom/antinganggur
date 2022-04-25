<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email', 50)->unique();
            $table->string('phone', 15);
            $table->text('address');
            $table->text('description');
            $table->string('password', 70);
            $table->string('photo');
            $table->string('website', 20);
            $table->string('facebook', 50);
            $table->string('instagram', 30);
            $table->foreignId('businessfield_id')->nullable()->constrained('businessfields')->onDelete('cascade');
            $table->foreignId('province_id')->nullable()->constrained('provinces')->onDelete('cascade');
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
        Schema::dropIfExists('companies');
    }
}
