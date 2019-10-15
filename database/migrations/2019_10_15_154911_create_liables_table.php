<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut');
            $table->string('name');
            $table->string('apePat');
            $table->string('apeMat');
            $table->unsignedBigInteger('liability_id')->nullable();
            $table->foreign('liability_id')
                ->references('id')
                ->on('liabilities')
                ->onDelete('set null');
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
        Schema::dropIfExists('liables');
    }
}
