<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('datacrips', function (Blueprint $table) {
            $table->id();
            $table->integer('nilaimtk');
            $table->string('kategori');
            $table->integer('nilai');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datacrips');
    }
};
