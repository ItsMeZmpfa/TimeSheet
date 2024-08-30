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
        Schema::create('employer_configs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employer_id')->index();
            $table->foreign('employer_id')->references('id')->on('employers');
            $table->float('allowHours')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_configs');
    }
};
