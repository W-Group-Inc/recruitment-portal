<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableManPowerRequisitionForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_man_power_requisition_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mrf_no');
            $table->string('position_title')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->date('target_date')->nullable();
            $table->string('position_status')->nullable();
            $table->string('resign_employee')->nullable();
            $table->text('justification')->nullable();
            $table->tinyInteger('is_plantilla')->nullable();
            $table->tinyInteger('is_job_description')->nullable();
            $table->text('mrf_attachment')->nullable();
            $table->string('educational_attainment')->nullable();
            $table->string('work_experience')->nullable();
            $table->string('specific_field')->nullable();
            $table->string('special_skills')->nullable();
            $table->string('others')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('job_level')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('other_remarks')->nullable();
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
        Schema::dropIfExists('table_man_power_requisition_forms');
    }
}
