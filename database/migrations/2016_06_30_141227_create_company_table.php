<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo');
            $table->longText('address');
            $table->string('website')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('mobile');
            $table->string('directory_name');
            $table->boolean('status')
                ->default(1);
            $table->string('proffesion');
            $table->integer('created_by')
              ->unsigned();
            $table->foreign('created_by')
              ->references('id')
              ->on('users')
              ->onDelete('cascade')
              ->onUpdate('cascade');
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
        Schema::drop('company');
    }
}
