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
            //Website_data
            $table->string('Website_name')->nullable();
            $table->string('Website_url')->nullable();
            $table->string('page_title')->nullable();
            $table->string('meta_keywords', 500)->nullable();
            $table->string('meta_Description', 500)->nullable();

            //Website_Information
            $table->string('Address', 500)->nullable();
            $table->string('Phone1')->nullable();
            $table->string('Email_ID')->nullable();

            //Social Media URL

            $table->string('Facebook')->nullable();
            $table->string('Instagram')->nullable();
            $table->string('Twitter')->nullable();
            $table->string('YouTube')->nullable();
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
