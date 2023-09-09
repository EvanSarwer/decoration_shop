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
        Schema::create('page_properties', function (Blueprint $table) {
            $table->id();
            $table->string('whatsapp_number');
            $table->string('phone_number');
            $table->string('email');
            $table->string('opening_hours1')->nullable();
            $table->string('slider_image1')->default('carousel-bg-1.jpg');
            $table->string('slider_image2')->default('carousel-bg-2.jpg');
            $table->string('about_image')->default('about.jpg');
            $table->text('address');
            $table->text('address_link');
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->integer('years_experience')->default(0);
            $table->integer('expert_technicians')->default(0);
            $table->integer('satisfied_clients')->default(0);
            $table->integer('compleate_projects')->default(0);
            $table->longText('client_feedbacks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_properties');
    }
};
