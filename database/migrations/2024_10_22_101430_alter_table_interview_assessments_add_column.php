<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableInterviewAssessmentsAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interview_assessments', function (Blueprint $table) {
            $table->integer('hr_recommendation')->nullable();
            $table->integer('sup_recommendation')->nullable();
            $table->integer('head_recommendation')->nullable();
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
