<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_structures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_id')->index();
            $table->string('label',100);
            $table->string('type',100);
            $table->string('name',100);
            $table->string('css',100)->default('form-control');
            $table->string('element_id',100);
            $table->string('element',100);
            $table->string('other',255);
            $table->integer('required')->default(0);
            $table->integer('status')->default(1);

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
        Schema::dropIfExists('form_structures');
    }
}
