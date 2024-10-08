<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->nullable();
            $table->string('employee')->nullable();
            $table->string('application')->nullable();
            $table->string('position')->nullable();
            $table->string('minimum_expected_salary')->nullable();
            $table->dateTime('date_available_for_employment')->nullable();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('present_house_no')->nullable();
            $table->string('present_street_name')->nullable();
            $table->string('present_barangay')->nullable();
            $table->string('present_municipality')->nullable();
            $table->string('permanent_house_no')->nullable();
            $table->string('permanent_street_name')->nullable();
            $table->string('permanent_barangay')->nullable();
            $table->string('permanent_municipality')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_company_location')->nullable();
            $table->string('father_contact_no')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_company_location')->nullable();
            $table->string('mother_contact_no')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_company_location')->nullable();
            $table->string('spouse_contact_no')->nullable();
            $table->string('college_course')->nullable();
            $table->string('college_school_name')->nullable();
            $table->string('college_school_address')->nullable();
            $table->string('college_year_attended')->nullable();
            $table->text('college_awards')->nullable();
            $table->string('hs_course')->nullable();
            $table->string('hs_school_name')->nullable();
            $table->string('hs_school_address')->nullable();
            $table->string('hs_year_attended')->nullable();
            $table->text('hs_awards')->nullable();
            $table->string('others_course')->nullable();
            $table->string('others_school_name')->nullable();
            $table->string('others_school_address')->nullable();
            $table->string('others_year_attended')->nullable();
            $table->text('others_awards')->nullable();
            $table->string('licensure_examination')->nullable();
            $table->string('rating')->nullable();
            $table->string('government_examination')->nullable();
            $table->string('gov_rating')->nullable();
            $table->string('name_of_company')->nullable();
            $table->string('address_of_company')->nullable();
            $table->string('last_position')->nullable();
            $table->string('employment_period')->nullable();
            $table->string('company_industry')->nullable();
            $table->string('reason_for_leaving')->nullable();
            $table->string('last_salary')->nullable();
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
        Schema::dropIfExists('job_application');
    }
}
