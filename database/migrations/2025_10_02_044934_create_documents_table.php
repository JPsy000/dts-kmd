<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('dms_no')->nullable();
            $table->bigInteger('doctype_id')->unsigned();
            $table->string('case_no')->nullable();
            $table->string('location')->nullable();
            $table->string('investigator')->nullable();
            $table->string('approver')->nullable();
            $table->string('date_received')->nullable();
            $table->string('date_released')->nullable();
            $table->text('subject')->nullable();
            $table->string('file_upload')->nullable();
            $table->string('encoded_by')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
