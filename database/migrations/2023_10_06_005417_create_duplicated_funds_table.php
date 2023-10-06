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
        Schema::create('duplicated_funds', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('fund_id', 36);
            $table->timestamps();

            $table->foreign('fund_id')->references('id')->on('funds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duplicated_funds');
    }
};
