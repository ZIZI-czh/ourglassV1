<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('robots_api_data', function (Blueprint $table) {
            $table->string('robotId');
            $table->string('groupId');
            $table->string('editRoute');
            $table->string('chargeStage');
            $table->string('moveState');
            $table->string('robotState');
            $table->string('robotPower');
            $table->boolean('robotWifi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('robots_api_data');
    }
};
