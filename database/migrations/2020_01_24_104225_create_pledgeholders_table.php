<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePledgeHoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pledgeholders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('realestateasset_id');
            $table->foreign('realestateasset_id')->references('id')->on('realestateassets');
            $table->string('bank_name');
            $table->string('start_period');
            $table->string('end_period');
            $table->string('contract');
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
        Schema::dropIfExists('pledgeholders');
    }
}
