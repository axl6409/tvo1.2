<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->bigInteger('steam_id')->nullable();
            $table->string('avatar')->nullable();
            $table->string('first_name',250)->nullable();
            $table->string('last_name',250)->nullable();
            $table->string('slug')->nullable();
            $table->string('job')->nullable();
            $table->text('bio')->nullable();
            $table->date('date_of_birth')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
