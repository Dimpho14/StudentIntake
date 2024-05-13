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
            $table->string('name');
            $table->string('middlename')->nullable();
            $table->string('surname');
            $table->foreignId('gender_id')->constrained()->onDelete('cascade');
            $table->foreignId('method_id')->constrained()->onDelete('cascade');
            $table->bigInteger('contactno');
            $table->bigInteger('idno');
            $table->bigInteger('studentno');
            $table->string('course');
            $table->string('emailaddress');
            $table->date('dateofoccupation');
            $table->string('nextofkinname');
            $table->bigInteger('nextofkincontact');
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->foreignId('building_id')->constrained()->onDelete('cascade');
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
