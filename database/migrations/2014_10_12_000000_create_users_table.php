<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_roles_id')->unsigned()->nullable()->references('id')->on('user_roles');
            $table->string('username')->nullable();
            $table->string('email')->unique()->nullable();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

// CREATE TABLE `users` (
//   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
//   `user_roles_id` int(11) unsigned DEFAULT NULL,
//   `username` varchar(255) DEFAULT NULL,
//   `email` varchar(255) DEFAULT NULL,
//   `created_at` timestamp NULL DEFAULT NULL,
//   `updated_at` timestamp NULL DEFAULT NULL,
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
