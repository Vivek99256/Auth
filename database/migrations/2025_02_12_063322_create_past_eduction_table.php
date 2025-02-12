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
        Schema::create('past_eduction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('past_id');
            $table->string('medium');
            $table->string('name_of_board');
            $table->integer('year');
            $table->integer('percentage');
            $table->string('school_name');
            $table->string('place');
            $table->string('trial');
            $table->timestamps();

            $table->foreign('past_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_eduction');
    }
};
