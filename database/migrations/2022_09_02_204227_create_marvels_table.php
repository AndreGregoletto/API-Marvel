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
        Schema::create('marvels', function (Blueprint $table) {
            $table->id();
            $table->char('title')->nullable();
            $table->char('description')->nullable();
            $table->char('type');
            $table->char('series')->nullable();
            $table->char('comics')->nullable();
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
        Schema::dropIfExists('marvels');
    }
};
