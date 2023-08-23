<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text1');
            $table->string('text2')->nullable();
            $table->string('text3')->nullable();
            $table->double('price');
            $table->double('offer_percent')->default(0);
            $table->enum('featuring',['yes','no'])->default('no');
            $table->string('image1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holidays');
    }
};
