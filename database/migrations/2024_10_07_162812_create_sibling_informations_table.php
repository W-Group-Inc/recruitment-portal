<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiblingInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sibling_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->nullable();
            $table->string('sibling_name')->nullable();
            $table->string('sibling_contact')->nullable();
            $table->string('sibling_company_location')->nullable();
            $table->string('sibling_contact_no')->nullable();
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
        Schema::dropIfExists('sibling_informations');
    }
}
