<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatPercentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_percent', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('cat_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->double('mark_percent')->default(0);
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
        Schema::dropIfExists('cat_percent');
    }
}
