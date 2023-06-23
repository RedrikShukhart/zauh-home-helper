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
        Schema::create('zh_views_values_variants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('zh_users')->cascadeOnDelete();
            $table->foreignId('view_var_id')->constrained('zh_views_values')->cascadeOnDelete();
            $table->foreignId('view_category_id')->constrained('zh_categories')->cascadeOnDelete();

            $table->string('var_variant', 128);

            $table->char('status', 1)->default('A');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zh_views_values_variants');
    }
};
