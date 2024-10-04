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
        Schema::create('doucumets', function (Blueprint $table) {
            $table->id();
            $table->char('uuid',36)->unique();
            $table->char('public_access')->nullable();
            $table->char('type')->default('image');
            $table->char('title')->nullable();
            $table->char('category_owned_by')->nullable();
            $table->unsignedBigInteger('id_belongs_to')->nullable();
            $table->unsignedBigInteger('team_id_belongs_to')->nullable();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->char('color',12)->nullable();
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doucumets');
    }
};
