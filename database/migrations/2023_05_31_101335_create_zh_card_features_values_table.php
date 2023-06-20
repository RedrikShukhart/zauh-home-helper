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
        Schema::create('zh_card_features_values', function (Blueprint $table) {
            $table->id();

            // $table->bigInteger('feature_id')->unsigned();
            // $table->foreign('feature_id')->references('feature_id')->on('zh_card_features')->onDelete('cascade');
            $table->foreignId('feature_id')->constrained('zh_card_features')->cascadeOnDelete();
            
            // $table->bigInteger('variant_id')->unsigned();
            // $table->foreign('variant_id')->references('variant_id')->on('zh_feature_variants')->onDelete('cascade');
            $table->foreignId('variant_id')->constrained('zh_feature_variants')->cascadeOnDelete();

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
        Schema::dropIfExists('zh_card_features_values');
    }
};
