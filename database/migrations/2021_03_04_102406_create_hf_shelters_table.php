<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHfSheltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hf_shelters', function (Blueprint $table) {
            $table->id();
            $table->string('ownership')->nullable();
            $table->string('type')->nullable();
            $table->string('support_required')->nullable();
            $table->unsignedBigInteger('family_id')->nullable();
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
        Schema::dropIfExists('hf_shelters');
    }
}
