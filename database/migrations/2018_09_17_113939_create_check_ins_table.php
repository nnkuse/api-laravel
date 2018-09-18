<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('check_ins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->index();
            $table->foreign('student_id')
                ->references('student_id')
                ->on('students')
                ->onDelete('cascade');
            $table->integer('subject_check_in_id')->unsigned()->index();
            $table->foreign('subject_check_in_id')
                ->references('id')
                ->on('subject_check_ins')
                ->onDelete('cascade');
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
        Schema::dropIfExists('check_ins');
    }
}
