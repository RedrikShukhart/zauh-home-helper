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
        Schema::create('zh_cards', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('zh_users')->cascadeOnDelete();

            // $table->bigInteger('card_type_id')->unsigned();
            // $table->foreign('card_type_id')->references('view_id')->on('zh_views')->onDelete('cascade');
            $table->foreignId('card_type_id')->constrained('zh_categories')->cascadeOnDelete();

            $table->string('title', 128);
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('sourse_link')->nullable();

            $table->char('status', 1)->default('A');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zh_cards');
    }
};
