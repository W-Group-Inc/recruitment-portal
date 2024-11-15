<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditColumnInApplicantExamResult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicant_exam_results', function (Blueprint $table) {
            $table->dropColumn('exam_name');
            $table->dropColumn('exam_score');
            $table->dropColumn('status');

            $table->string('critical_thinking')->nullable();
            $table->string('disc_personality')->nullable();
            $table->string('supervisory_skills')->nullable();
            $table->string('managerial_skills')->nullable();
            $table->string('accounting_skills')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applicant_exam_results', function (Blueprint $table) {
            //
        });
    }
}
