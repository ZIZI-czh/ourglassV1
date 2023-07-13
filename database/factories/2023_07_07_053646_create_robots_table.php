?
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
            $table->string('robotId');
            $table->string('robotName');
            $table->string('robotModel');
            $table->string('supplier');
            $table->string('groupId');
            $table->string('macAddress')->nullable();
            $table->string('pid')->nullable();
            $table->timestamps();
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