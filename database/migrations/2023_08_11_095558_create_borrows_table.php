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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')
                ->on('employees')->onDelete('cascade');
            $table->bigInteger('asset_id')->unsigned();
            $table->foreign('asset_id')->references('id')
                ->on('assets')->onDelete('cascade');
            $table->date('borrow_date');
            $table->date('return_date');
            $table->bigInteger('status_borrow_id')->unsigned();
            $table->foreign('status_borrow_id')->references('id')
                ->on('status_borrows')->onDelete('cascade');
            $table->string('letter')->nullable();
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
        Schema::dropIfExists('borrows');
    }
};
