<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInInterviewAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interview_assessments', function (Blueprint $table) {
            $table->string('head_job_knowledge')->nullable();
            $table->text('head_strength')->nullable();
            $table->text('head_areas_for_improvement')->nullable();
            $table->string('sup_job_knowledge')->nullable();
            $table->text('sup_strength')->nullable();
            $table->text('sup_areas_for_improvement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interview_assessments', function (Blueprint $table) {
            //
        });
    }
}
