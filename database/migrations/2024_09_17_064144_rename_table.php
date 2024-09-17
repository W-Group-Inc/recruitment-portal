<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('table_man_power_requisition_form', function (Blueprint $table) {
        //     //
        // });
        Schema::rename('table_man_power_requisition_forms', 'man_power_requisition_forms');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_man_power_requisition_form', function (Blueprint $table) {
            //
        });
    }
}
