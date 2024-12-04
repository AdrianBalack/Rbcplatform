<?php

use App\Enums\ContributionStatus;
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
        Schema::create('contributions', function (Blueprint $table) {
            $table->uuid('id');


            $table->decimal('amount', 10, 2);
            $table->string('status')->defaultValue(ContributionStatus::PENDING);

            $table->foreignUuid('user_id');
            $table->foreignUuid('project_id');
            $table->foreignUuid('reward_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contributions');
    }
};
