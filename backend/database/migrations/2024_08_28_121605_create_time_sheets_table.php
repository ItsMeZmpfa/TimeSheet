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
        Schema::disableForeignKeyConstraints();

        Schema::create('time_sheets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employerId')->index();
            $table->foreign('employerId')->references('id')->on('employers');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('submit_status');
            $table->boolean('approved_status');
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
