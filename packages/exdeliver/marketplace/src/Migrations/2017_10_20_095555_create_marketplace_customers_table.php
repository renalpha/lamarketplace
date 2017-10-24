<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketplaceVendorsTable extends Migration
{
    public function up()
    {
        Schema::create('marketplace_customers', function(Blueprint $column)
        {
            $column->increments('id')->unsigned();
            $column->integer('user_id')->index();
            $column->timestamps();
        });

        Schema::create('marketplace_customer_billing', function(Blueprint $column)
        {
            $column->increments('id')->unsigned();
            $column->integer('customer_id')->index();
            $column->string('companyname')->nullable();
            $column->string('firstname');
            $column->string('lastname');
            $column->string('street');
            $column->string('street_number');
            $column->string('zipcode');
            $column->string('city');
            $column->string('email')->nullable();
            $column->string('phone')->nullable();
            $column->string('mobile')->nullable();
            $column->timestamps();
        });

        Schema::create('marketplace_customer_shipping', function(Blueprint $column)
        {
            $column->increments('id')->unsigned();
            $column->integer('customer_id')->index();
            $column->string('companyname')->nullable();
            $column->string('firstname');
            $column->string('lastname');
            $column->string('street');
            $column->string('street_number');
            $column->string('zipcode');
            $column->string('city');
            $column->string('email')->nullable();
            $column->string('phone')->nullable();
            $column->string('mobile')->nullable();
            $column->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('marketplace_customers');
        Schema::drop('marketplace_customer_billing');
        Schema::drop('marketplace_customer_shipping');
    }
}