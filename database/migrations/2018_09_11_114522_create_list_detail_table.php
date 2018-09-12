<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_details', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('ListDetailID');
            $table->integer('ListOfDateID')->unsigned();
            $table->foreign('ListOfDateID')
                ->references('ListOfDateID')
                ->on('list_of_date')
                ->onDelete('cascade');
            $table->string('ListName', 100);
            $table->decimal('Incom', 8, 2);
            $table->decimal('Expense', 8, 2);
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
        Schema::dropIfExists('list_details');
    }
}
