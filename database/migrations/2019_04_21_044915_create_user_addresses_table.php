<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('address')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_addresses');
    }
}

// CREATE TABLE `user_addresses` (
//   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
//   `user_id` int(11) unsigned DEFAULT NULL,
//   `address` varchar(255) DEFAULT NULL,
//   `province` varchar(255) DEFAULT NULL,
//   `city` varchar(255) DEFAULT NULL,
//   `country` varchar(255) DEFAULT NULL,
//   `postal_code` varchar(255) DEFAULT NULL,
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
