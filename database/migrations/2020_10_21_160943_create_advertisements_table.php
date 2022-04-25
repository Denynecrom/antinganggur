<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('position', 50);
            $table->enum('classification', ['Fulltime', 'Parttime']);
            $table->tinyInteger('work_experience');
            $table->enum('education', ['sd', 'smp', 'sma/smk', 'd1', 'd2', 'd3', 'd4', 's1']);
            $table->text('workdescription');
            $table->text('qualification');
            $table->integer('salary');
            $table->integer('needed');
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->boolean('show');
            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('company_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
