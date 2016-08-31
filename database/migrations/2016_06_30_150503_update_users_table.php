<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')
              ->references('id')
              ->on('roles')
              ->onDelete('cascade')
              ->onUpdate('cascade');
            $table->integer('created_by')
              ->unsigned()
              ->nullable();
            $table->foreign('created_by')
              ->references('id')
              ->on('users')
              ->onDelete('cascade')
              ->onUpdate('cascade');
            $table->string('directory_name');
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
