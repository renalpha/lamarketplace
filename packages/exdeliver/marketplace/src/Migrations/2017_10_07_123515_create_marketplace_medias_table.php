<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarketplaceMediasTable extends Migration
{
    public function up()
    {
        Schema::create('marketplace_medias', function (Blueprint $column) {
            $column->increments('id')->unsigned();
            $column->integer('user_id')->index();
            $column->string('title')->nullable();
            $column->string('filename')->nullable();
            $column->text('description', 65535);
            $column->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('marketplace_medias');
    }
}