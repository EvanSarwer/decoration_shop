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
        Schema::create('balloons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->integer('category_id');
            $table->string('size')->nullable();
            $table->string('brand')->nullable();
            $table->string('shape')->nullable();
            $table->integer('quantity')->nullable();
            $table->double('price');
            $table->double('offer_percent')->default(0);
            $table->enum('featuring',['yes','no'])->default('no');
            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balloons');
    }
};
