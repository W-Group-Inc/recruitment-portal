<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnInChildrenInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('children_informations', function (Blueprint $table) {
            $table->renameColumn('job_id', 'job_application_id');
            $table->renameColumn('children_contact', 'children_occupation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('children_information', function (Blueprint $table) {
            
        });
    }
}
