<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHfFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hf_families', function (Blueprint $table) {
            $table->id();
            $table->string('family_code')->nullable();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('family_address_id')->nullable();
            $table->string('religion')->nullable();
            $table->string('language')->nullable();
            $table->string('ration_card_type')->nullable();
            $table->string('ration_card_no')->nullable();
            $table->string('ration_img_url')->nullable();
            $table->string('income')->nullable();
            $table->string('income_source')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('jamath_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
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
        Schema::dropIfExists('hf_families');
    }
}
