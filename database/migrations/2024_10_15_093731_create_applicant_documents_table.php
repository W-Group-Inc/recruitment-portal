<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('document_id')->nullable();
            $table->integer('applicant_id')->nullable();
            $table->string('document_name')->nullable();
            $table->string('document_file')->nullable();
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
        Schema::dropIfExists('applicant_documents');
    }
}
