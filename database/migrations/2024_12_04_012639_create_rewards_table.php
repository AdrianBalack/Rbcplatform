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
        Schema::create('rewards', function (Blueprint $table) {
            $table->uuid('id');

            $table->string(column: 'title');
            $table->string('description');
            $table->decimal('amount' . 15, 2);
            $table->integer('limited_quantity');
            $table->dateTime('estimated_delivery');
            $table->foreignUuid('project_id')->constrained('projects')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewards');
    }
};
