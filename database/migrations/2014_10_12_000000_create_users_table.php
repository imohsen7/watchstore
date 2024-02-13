<?php

use App\Enums\UserStatus;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullabel();
            $table->string('username',50)->nullabel();
            $table->string('mobile')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('photo')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->string('status')->default(UserStatus::Active->value);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
