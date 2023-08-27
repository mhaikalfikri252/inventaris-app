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
                ->on('facility')->onDelete('cascade');
            $table->date('purchase_date');
            $table->string('location');
            $table->string('pic');
            $table->decimal('price', 19, 0);
            $table->string('photo');
            $table->bigInteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id')
                ->on('status')->onDelete('cascade');
            $table->string('information');
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
