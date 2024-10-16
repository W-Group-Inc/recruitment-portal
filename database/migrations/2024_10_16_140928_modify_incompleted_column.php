<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyIncompletedColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->string('contact_number')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('same_as')->nullable();
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
            $table->dropColumn('contact_number');
            $table->dropColumn('civil_status');
            $table->dropColumn('age');
            $table->dropColumn('gender');
            $table->dropColumn('citizenship');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('place_of_birth');
        });
    }
}
