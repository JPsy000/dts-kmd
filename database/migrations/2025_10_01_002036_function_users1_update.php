<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FunctionUsers1Update extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('phone_number')->nullable()->after('last_name');
            $table->text('address')->nullable()->after('phone_number');
            $table->bigInteger('office_id')->nullable()->after('address');
            $table->bigInteger('position_id')->nullable()->after('office_id');
            $table->string('profile_picture')->nullable()->after('position_id');
            $table->string('status')->default('active')->after('profile_picture');
            $table->string('user_type')->default('users')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
