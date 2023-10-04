<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->enum('group_type',['public','private'])->default('public');
            $table->text('bio')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
        Schema::create('group_user',function (Blueprint $table){
           $table->integer('group_id')->nullable();
           $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
        Schema::dropIfExists('group_user');
    }
}
