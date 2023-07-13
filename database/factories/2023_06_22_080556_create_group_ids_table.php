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
        Schema::create('robots', function (Blueprint $table) {
            $table->id();
            $table->string('robotId');
            $table->string('robotName');
            $table->string('robotModel');
            $table->string('supplier');
            $table->string('macAddress');
            $table->string('pid');
            $table->unsignedBigInteger('groupId'); // Add foreign key column
            $table->timestamps();

            $table->foreign('groupId')->references('groupId')->on('group_ids')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('robots');

    }
};