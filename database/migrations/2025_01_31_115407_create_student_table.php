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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('stud_name');
            $table->string('mid_name');
            $table->string('surname');
            $table->integer('stud_mobile_no');
            $table->date('birthdate');
            $table->integer('father_mobile_no');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->integer('pincode');
            $table->string('section');
            $table->string('standard');
            $table->string('division');
            $table->string('quota');
            $table->string('gender');
            $table->string('photo');
            $table->string('religion');
            $table->string('cast');
            $table->string('blood_gp');
            $table->string('adhar_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
