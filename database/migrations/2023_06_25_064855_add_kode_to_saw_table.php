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
        Schema::table('saw', function (Blueprint $table) {
            $table->string('kode');
            $table->integer('b_c5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saw', function (Blueprint $table) {
            $table->dropColumn('kode');
            $table->dropColumn('b_c5');
        });
    }
};
