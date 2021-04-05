<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHfFamilyMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hf_family_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_id')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('relationship')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('occupation_type')->nullable();
            $table->string('name')->nullable();
            $table->string('profile_img_url')->nullable();
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
        Schema::dropIfExists('hf_family_members');
    }
}
