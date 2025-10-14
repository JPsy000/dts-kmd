<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_track', function (Blueprint $table) {
            $table->id();
            $table->string('dms_no')->unique();
            $table->string('date_received')->nullable();
            $table->string('date_released')->nullable();
            $table->string('remarks')->nullable();
            $table->string('from')->nullable();
            $table->string('encoded_by')->nullable();
            $table->string('to')->nullable();
            $table->string('received_by')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('doc_track');
    }
}
