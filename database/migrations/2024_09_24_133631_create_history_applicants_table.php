<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('status');
            $table->string('email');
            $table->string('position');
            $table->string('date_applied');
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
        Schema::dropIfExists('history_applicants');
    }
}
