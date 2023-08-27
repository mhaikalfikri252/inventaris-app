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
        Schema::create('lendings', function (Blueprint $table) {
            $table->id();
            $table->string('person_name');
            $table->bigInteger('asset_id')->unsigned()->unique();
            $table->foreign('asset_id')->references('id')
                ->on('assets')->onDelete('cascade');
            $table->date('loan_date');
            $table->date('return_date');
            $table->bigInteger('status_lending_id')->unsigned();
            $table->foreign('status_lending_id')->references('id')
                ->on('status_lendings')->onDelete('cascade');
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
        Schema::dropIfExists('lendings');
    }
};
