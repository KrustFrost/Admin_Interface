<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->mediumText('avatar_photo')->nullable();
            $table->string('email')->unique();
            $table->string('name')->nullable();
            $table->string('school_id_number')->nullable();
            $table->string('contact_number')->nullable();
            $table->integer('age')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('status')->nullable();
            $table->string('gender')->nullable();
            $table->string('school_branch')->nullable();
            $table->string('interests')->nullable();
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
