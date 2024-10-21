<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnIsClose extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('man_power_requisition_forms', function (Blueprint $table) {
            $table->integer('recruiter_id')->nullable();
            $table->dropColumn('is_close');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('man_power_requisition_forms', function (Blueprint $table) {
            
        });
    }
}
