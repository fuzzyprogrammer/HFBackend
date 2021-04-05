<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHfOccupationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hf_occupation_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_member_id')->nullable();
            $table->string('occupation')->nullable();
            $table->string('income')->nullable();
            $table->string('workplace_name')->nullable();
            $table->string('workplace_address')->nullable();
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
        Schema::dropIfExists('hf_occupation_details');
    }
}
