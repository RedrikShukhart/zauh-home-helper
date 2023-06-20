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
        Schema::create('zh_users', function (Blueprint $table) {
            $table->id();
            $table->char('user_type', 1)->default('U');
            $table->char('status', 1)->default('A');

            $table->string('name', 128);
            $table->string('password');
            $table->string('email')->unique();
            $table->string('phone', 25)->unique()->nullable();
            $table->string('telegram', 128)->unique()->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('last_login')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zh_users');
    }
};
