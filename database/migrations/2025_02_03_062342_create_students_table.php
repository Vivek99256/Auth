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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
        $table->string('stud_name');
        $table->string('mid_name')->nullable();
        $table->string('surname');
        $table->string('stud_mobile_no');
        $table->date('birthdate');
        $table->string('father_mobile_no')->nullable();
        $table->string('email');
        $table->text('address')->nullable();
        $table->string('state');
        $table->string('city');
        $table->string('pincode');
        $table->string('section');
        $table->string('standard');
        $table->string('division');
        $table->string('quota');
        $table->string('gender');
        $table->string('photo')->nullable();
        $table->string('religion');
        $table->string('caste');
        $table->string('blood_group');
        $table->string('adhar_no');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
