<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHfAcademicDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hf_academic_details', function (Blueprint $table) {
            $table->id();
            $table->string('academic_year')->nullable();
            $table->string('class')->nullable();
            $table->string('major')->nullable();
            $table->string('academy_name')->nullable();
            $table->string('academic_medium')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hf_academic_details');
    }
}
