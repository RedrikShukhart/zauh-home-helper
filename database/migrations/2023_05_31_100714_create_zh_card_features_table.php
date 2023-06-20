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
        Schema::create('zh_card_features', function (Blueprint $table) {
            $table->id();

            // $table->bigInteger('user_id')->unsigned();
            // $table->foreign('user_id')->references('user_id')->on('zh_users')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('zh_users')->cascadeOnDelete();

            $table->string('feature');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zh_card_features');
    }
};
