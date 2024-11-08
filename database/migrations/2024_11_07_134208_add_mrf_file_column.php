<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMrfFileColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('man_power_requisition_forms', function (Blueprint $table) {
            $table->text('mrf_file')->nullable();
            $table->dropColumn('recruiter_id');
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
            //
        });
    }
}
