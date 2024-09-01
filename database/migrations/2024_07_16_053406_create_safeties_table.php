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
        Schema::create('safeties', function (Blueprint $table) {
            $table->id();
            $table->string('safty_content1')->nullable();
            $table->string('safty_content2')->nullable();
            $table->string('safty_content3')->nullable();
            $table->string('safty_content4')->nullable();
            $table->string('safty_img1')->nullable();
            $table->string('safty_img2')->nullable();
            $table->string('safty_img3')->nullable();
            $table->string('safty_img4')->nullable();
            $table->text('youtube_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safeties');
    }
};
