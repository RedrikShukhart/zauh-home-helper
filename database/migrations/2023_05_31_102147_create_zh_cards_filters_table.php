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
        Schema::create('zh_cards_filters', function (Blueprint $table) {
            $table->id();

            // $table->bigInteger('filter_id')->unsigned();
            // $table->foreign('filter_id')->references('filter_id')->on('zh_filters')->onDelete('cascade');
            $table->foreignId('filter_id')->constrained('zh_filters')->cascadeOnDelete();

            // $table->bigInteger('category_id')->unsigned();
            // $table->foreign('category_id')->references('category_id')->on('zh_categories')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('zh_categories')->cascadeOnDelete();

            // $table->bigInteger('card_id')->unsigned();
            // $table->foreign('card_id')->references('card_id')->on('zh_cards')->onDelete('cascade');
            $table->foreignId('card_id')->constrained('zh_cards')->cascadeOnDelete();

            $table->char('status', 1)->default('A');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zh_cards_filters');
    }
};
