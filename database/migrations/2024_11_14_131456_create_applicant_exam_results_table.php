<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantExamResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_exam_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mrf_id')->nullable();
            $table->integer('applicant_id')->nullable();
            $table->string('exam_name')->nullable();
            $table->decimal('exam_score')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('applicant_exam_results');
    }
}
