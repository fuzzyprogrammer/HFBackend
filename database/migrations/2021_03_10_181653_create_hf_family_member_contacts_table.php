<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHfFamilyMemberContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hf_family_member_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_id')->nullable();
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
        Schema::dropIfExists('hf_family_member_contacts');
    }
}
