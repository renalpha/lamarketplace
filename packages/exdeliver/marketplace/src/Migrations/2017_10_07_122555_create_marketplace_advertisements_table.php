<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketplaceAdvertisementsTable extends Migration
{
    public function up()
    {
        Schema::create('marketplace_advertisements', function(Blueprint $column)
        {
            $column->increments('id')->unsigned();
            $column->integer('category_id')->index()->nullable();
            $column->integer('user_id')->index();
            $column->integer('vendor_id')->index();
            $column->string('title')->nullable();
            $column->string('slug');
            $column->string('filename')->nullable();
            $column->text('content',4294967295); //longtext for summernote supported images
            $column->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('marketplace_advertisements');
    }
}