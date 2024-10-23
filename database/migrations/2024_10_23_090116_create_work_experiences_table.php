<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_application_id')->nullable();
            $table->string('name_of_company')->nullable();
            $table->string('address_of_company')->nullable();
            $table->string('position')->nullable();
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
        Schema::dropIfExists('work_experiences');
    }
}
