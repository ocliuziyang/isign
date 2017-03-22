<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersForeignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->tinyInteger('role_level')->after('job');
            $table->integer('bus_id')->unsigned()->after('role_level')->nullable();

            $table->foreign('role_level')->on('roles')->references('level');
            $table->foreign('bus_id')->on('buses')->references('id');
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
            $table->dropForeign(['role_level']);
            $table->dropForeign(['bus_id']);
        });
    }
}
