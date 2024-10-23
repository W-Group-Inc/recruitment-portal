<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnsInJobApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->removeColumn('name_of_company');
            $table->removeColumn('address_of_company');
            $table->removeColumn('last_position');
            $table->removeColumn('employment_period');
            $table->removeColumn('company_industry');
            $table->removeColumn('reason_for_leaving');
            $table->removeColumn('last_salary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            //
        });
    }
}
