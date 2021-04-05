<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHfFamilyMemberLaboursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hf_family_member_labours', function (Blueprint $table) {
            $table->id();
            $table->string('labour_card_no')->nullable();
            $table->string('labour_card_img_url')->nullable();
            $table->unsignedBigInteger('family_member_id')->nullable();
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
        Schema::dropIfExists('hf_family_member_labours');
    }
}
