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
        Schema::create('service_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->string('img')->nullable();
            $table->string('title');
            $table->string('small_desc');
            $table->string('type');
            $table->integer('status')->default(1)->comment('1=Active, 0=Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_infos');
    }
};
