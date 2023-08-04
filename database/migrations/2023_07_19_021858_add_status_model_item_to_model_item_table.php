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
            $table->string('status_model_item', 20)->after('satuan')->default('Request');
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
            $table->dropColumn('status_model_item');
        });
    }
};
