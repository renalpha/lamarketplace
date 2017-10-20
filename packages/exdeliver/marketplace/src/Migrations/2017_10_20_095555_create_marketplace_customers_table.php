<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketplaceCustomersTable extends Migration
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
            $column->integer('street_number');
            $column->string('zipcode');
            $column->string('city');
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
            $column->integer('street_number');
            $column->string('zipcode');
            $column->string('city');
            $column->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('marketplace_customers');
    }
}