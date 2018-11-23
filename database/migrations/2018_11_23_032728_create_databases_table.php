<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create role table
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        // Creat user table
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('SET NULL');
            $table->rememberToken();
            $table->timestamps();
        });

        // Create permission table
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        // Create role_permission table
        Schema::create('role_permission', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('permission_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('CASCADE');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('CASCADE');
        });

        // Create post table
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('message');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->timestamps();
        });

        // Create profile table
        Schema::create('profiles', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('street');
            $table->string('zip');
            $table->string('city');
            $table->string('country');
            $table->date('birthday');
            $table->string('about');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->timestamps();
        });

        // Create profile field table
        Schema::create('profile_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        // Create comment table
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('message');
            $table->string('object_model');
            $table->integer('object_id');
            $table->unsignedInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('CASCADE');
            $table->timestamps();
        });

        // Create like table
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('object_model');
            $table->integer('object_id');
            $table->unsignedInteger('target_user_id');
            $table->unsignedInteger('created_by');
            $table->foreign('target_user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('CASCADE');
            $table->timestamps();
        });

        // Create module table
         Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        // Create setting table
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('value');
            $table->unsignedInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('CASCADE');
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
        Schema::dropIfExists('roles');
        Schema::dropIfExists('users');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('profile');
        Schema::dropIfExists('profile_fields');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('likes');
        Schema::dropIfExists('modules');
        Schema::dropIfExists('settings');        
    }
}
