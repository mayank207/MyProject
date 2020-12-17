<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviewer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
             $table->string('email')->unique();
             $table->string('mobile');
             $table->string('exmobile');
             $table->string('technology');
             $table->string('expirence');
             $table->string('currentsalary');
            $table->string('expectedsalary');
            $table->string('education');
            $table->text('practical');
            $table->text('technical');
            $table->text('general');
            $table->unsignedBigInteger('hr_id');
            $table->foreign('hr_id')->references('id')->on('users');
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
        Schema::dropIfExists('interviewer');
    }
}
