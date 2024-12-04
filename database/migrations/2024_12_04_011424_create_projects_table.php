<?php

use App\Models\User;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id');

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('description');
            $table->decimal('goal_amount', 15, 2);
            $table->decimal('current_amount', 15, 2)->default(0);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('status')->default(\App\Enums\ProjectStatus::DRAFT);
            $table->string('category', 100);
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
