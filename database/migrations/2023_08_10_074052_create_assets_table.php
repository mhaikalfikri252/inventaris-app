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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_code')->unique();
            $table->string('asset_name');
            $table->bigInteger('facility_id')->unsigned();
            $table->foreign('facility_id')->references('id')
                ->on('facilities')->onDelete('cascade');
            $table->date('purchase_date');
            $table->string('location');
            $table->bigInteger('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')
                ->on('employees')->onDelete('cascade');
            $table->decimal('price', 19, 0);
            $table->string('photo');
            $table->bigInteger('status_asset_id')->unsigned();
            $table->foreign('status_asset_id')->references('id')
                ->on('status_assets')->onDelete('cascade');
            $table->string('information')->nullable();
            $table->bigInteger('status_borrow_id')->unsigned()->nullable();
            $table->foreign('status_borrow_id')->references('id')
                ->on('status_borrows')->onDelete('cascade');
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
        Schema::dropIfExists('assets');
    }
};
