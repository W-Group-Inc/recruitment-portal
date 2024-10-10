<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_assessments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('personal_background')->nullable();
            $table->string('qualification')->nullable();
            $table->string('reason_for_transfer')->nullable();
            $table->string('examination_result')->nullable();
            $table->string('interview_assessment')->nullable();
            $table->string('salary_scale')->nullable();
            $table->string('salary_peers')->nullable();
            $table->string('current_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('recommendation_by_human_resources')->nullable();
            $table->string('recommendation_hbu')->nullable();
            $table->string('negotiated_amount')->nullable();
            $table->string('remarks')->nullable();
            $table->string('appearance')->nullable();
            $table->string('bearing')->nullable();
            $table->string('expression')->nullable();
            $table->string('motivation')->nullable();
            $table->string('personality')->nullable();
            $table->string('job_knowledge')->nullable();
            $table->string('hr_strengths')->nullable();
            $table->string('hr_areas_of_improvements')->nullable();
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
        Schema::dropIfExists('interview_assessments');
    }
}
