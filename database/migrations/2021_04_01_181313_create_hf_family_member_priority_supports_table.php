<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHfFamilyMemberPrioritySupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hf_family_member_priority_supports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_member_id')->nullable();
            $table->string('priority_support')->nullable();
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
        Schema::dropIfExists('hf_family_member_priority_supports');
    }
}
