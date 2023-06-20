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
        Schema::create('zh_category_views', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->constrained('zh_categories')->cascadeOnDelete();

            $table->foreignId('view_id')->constrained('zh_views')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zh_category_views');
    }
};
