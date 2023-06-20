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
        Schema::create('zh_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('parent_id');
            $table->string('path_id');
            $table->unsignedInteger('level')->default(1);

            $table->foreignId('user_id')->constrained('zh_users')->cascadeOnDelete();

            $table->string('route_name', 64);
            $table->string('short_name', 64);
            $table->string('full_name');

            $table->char('status', 1)->default('A');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zh_categories');
    }
};
