<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->nullable();
            $table->string('children_name')->nullable();
            $table->string('children_contact')->nullable();
            $table->string('children_company_location')->nullable();
            $table->string('children_contact_no')->nullable();
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
        Schema::dropIfExists('children_informations');
    }
}
