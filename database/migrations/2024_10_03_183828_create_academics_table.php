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
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->char('uuid',36)->unique();
            $table->char('salutation');
            $table->char('name');
            $table->text('post')->nullable();
            $table->json('affiliations')->nullable();
            $table->json('accredations')->nullable();
            $table->text('description')->nullable();
            $table->text('email')->nullable();
            $table->char('mobile1',15)->nullable();
            $table->char('mobile2',15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academics');
    }
};
