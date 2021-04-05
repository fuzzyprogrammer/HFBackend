<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHfFamilyMemberHealthDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hf_family_member_health_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_member_id')->nullable();
            $table->string('disease')->nullable();
            $table->string('since')->nullable();
            $table->string('status')->nullable();
            $table->string('hospital')->nullable();
            $table->string('place')->nullable();
            $table->string('exercise')->nullable();
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
        Schema::dropIfExists('hf_family_member_health_details');
    }
}
