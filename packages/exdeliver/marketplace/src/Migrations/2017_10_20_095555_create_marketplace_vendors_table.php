<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarketplaceCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('marketplace_vendors', function (Blueprint $column) {
            $column->increments('id')->unsigned();
            $column->integer('user_id')->index();
            $column->timestamps();
        });

        Schema::create('marketplace_vendor_info', function (Blueprint $column) {
            $column->increments('id')->unsigned();
            $column->integer('vendor_id')->index();
            $column->string('companyname')->nullable();
            $column->string('firstname');
            $column->string('lastname');
            $column->string('street');
            $column->string('street_number');
            $column->string('zipcode');
            $column->string('city');
            $column->string('country')->nullable();
            $column->string('email')->nullable();
            $column->string('phone')->nullable();
            $column->string('mobile')->nullable();
            $column->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('marketplace_vendors');
        Schema::drop('marketplace_vendor_info');
    }
}