<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarketplaceRolesTable extends Migration
{
    public function up()
    {
        Schema::create('marketplace_users_roles', function (Blueprint $column) {
            $column->increments('id')->unsigned();
            $column->integer('user_id')->index();
            $column->integer('role_id')->index();
            $column->timestamps();
        });

        Schema::create('marketplace_roles', function (Blueprint $column) {
            $column->increments('id')->unsigned();
            $column->string('role');
            $column->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('marketplace_users_roles');
        Schema::drop('marketplace_roles');
    }
}