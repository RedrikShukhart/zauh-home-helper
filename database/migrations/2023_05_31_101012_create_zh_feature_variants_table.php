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
        Schema::create('zh_feature_variants', function (Blueprint $table) {
            $table->id();

            // $table->bigInteger('feature_id')->unsigned();
            // $table->foreign('feature_id')->references('feature_id')->on('zh_card_features')->onDelete('cascade');
            $table->foreignId('feature_id')->constrained('zh_card_features')->cascadeOnDelete();

            $table->string('variant', 64);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zh_feature_variants');
    }
};
