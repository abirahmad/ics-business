<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
			$table->string('shop_name', 200)->nullable();
			$table->string('shop_url', 200)->nullable();
			$table->string('phone', 200)->nullable();
			$table->text('address')->nullable();
			$table->string('photo', 255)->nullable();
			$table->integer('role_id')->nullable();
			$table->integer('status_id')->nullable();
			$table->integer('bactive')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
