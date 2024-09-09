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
        Schema::disableForeignKeyConstraints();

        Schema::create('time_sheets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employerId')->index();
            $table->foreign('employerId')->references('id')->on('employers');
            $table->bigInteger('timeLogId')->index();
            $table->foreign('timeLogId')->references('id')->on('time_logs');
            $table->date('startDate');
            $table->date('endDate');
            $table->boolean('submitStatus')->default(false);
            $table->boolean('approvedStatus')->default(false);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_sheets');
    }
};
