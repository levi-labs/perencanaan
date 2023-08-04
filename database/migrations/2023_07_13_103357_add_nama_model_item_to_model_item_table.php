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
        Schema::table('model_item', function (Blueprint $table) {
            $table->string('nama_model_item', 40)->after('kode_model_item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('model_item', function (Blueprint $table) {
            $table->dropColumn('nama_model_item');
        });
    }
};
