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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->unique();
            $table->char('title');
            $table->text('description')->nullable();;
            $table->bigInteger('child_of')->nullable();
            $table->decimal('latitude',9,6)->nullable();
            $table->decimal('longitude',9,6)->nullable();
            $table->json('map_urls')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
