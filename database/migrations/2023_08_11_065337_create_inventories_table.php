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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('inventory_name');
            $table->bigInteger('facility_id')->unsigned();
            $table->foreign('facility_id')->references('id')
                ->on('facility')->onDelete('cascade');
            $table->date('purchase_date');
            $table->string('location');
            $table->string('pic');
            $table->decimal('price', 19, 0);
            $table->string('photo');
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
        Schema::dropIfExists('inventories');
    }
};
