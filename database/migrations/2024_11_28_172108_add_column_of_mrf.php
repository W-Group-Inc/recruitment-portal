<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnOfMrf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('man_power_requisition_forms', function(Blueprint $table) {
            $table->text('plantilla_attachment')->nullable();
            $table->text('job_description_attachment')->nullable();
            $table->text('resignation_letter_attachment')->nullable();
            $table->dropColumn('mrf_file');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
