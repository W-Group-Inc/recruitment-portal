<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnInSiblingInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sibling_informations', function (Blueprint $table) {
            $table->renameColumn('job_id', 'job_application_id');
            $table->renameColumn('sibling_contact', 'sibling_occupation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sibling_information', function (Blueprint $table) {
            //
        });
    }
}
