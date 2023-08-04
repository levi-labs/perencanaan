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
        Schema::create('model_item', function (Blueprint $table) {
            $table->id();
            $table->string('kode_model_item', 32);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('material_id');
            $table->string('qty');
            $table->string('satuan', 25);

            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('material')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_item');
    }
};
