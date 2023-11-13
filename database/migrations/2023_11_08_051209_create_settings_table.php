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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default('Lowtake');
            $table->string('fav_Icon')->nullable()->default('headerIcon.png');
            $table->string('header_Icon')->nullable()->default('headerIcon.png');
            $table->string('social_fb')->nullable()->default('https://www.facebook.com/');
            $table->string('social_insta')->nullable()->default('https://www.instagram.com/');
            $table->string('social_linkedein')->nullable()->default('https://bd.linkedin.com/');
            $table->string('social_youtube')->nullable()->default('https://www.youtube.com/');
            $table->string('social_tweet')->nullable()->default('https://twitter.com/?lang=en');
            $table->string('footer_Icon')->nullable()->default('footer.png');
            $table->longText('footer_text')->nullable();
            $table->longText('footer_address')->nullable()->default('29/B House,Mohammadiya Housing Limited Dhaka 12007');
            $table->string('footer_phone')->nullable()->default('+8801323456789, +8801923456789');
            $table->string('footer_email')->nullable()->default('info.lowtake@gmail.com');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
