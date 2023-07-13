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
        Schema::create('robots_each_store', function (Blueprint $table) {
            $table->id();
            $table->string('robotName');
            $table->string('robotIds');
            $table->string('groupId');
            $table->timestamps();

            $table->foreign('groupId')->references('groupId')->on('group_ids')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('robotsEachStore');
    }
};