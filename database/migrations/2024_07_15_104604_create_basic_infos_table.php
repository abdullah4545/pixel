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
        Schema::create('basic_infos', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->text('mobile_logo')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('phone');
            $table->string('phone_optional')->nullable();
            $table->string('email');
            $table->string('email_optional')->nullable();
            $table->text('address');
            $table->text('address_optional')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('youtube')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('instagram')->nullable();
            $table->text('pinterest')->nullable();
            $table->text('facebook_pixel')->nullable();
            $table->text('google_analytics')->nullable();
            //footer
            $table->text('footer_logo')->nullable();
            $table->text('footer_text')->nullable();
            $table->text('page_ss')->nullable();
            // meta
            $table->text('favicon')->nullable();
            $table->text('meta_image')->nullable();
            $table->text('meta_title')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->longText('meta_description')->nullable();

            // contact
            $table->text('contact_image')->nullable();
            $table->text('contact_title')->nullable();
            $table->longText('contact_description')->nullable();

            // page banner
            $table->text('servicepage')->nullable();
            $table->text('pricepage')->nullable();
            $table->text('projectpage')->nullable();
            $table->text('blogpage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_infos');
    }
};