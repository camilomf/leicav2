<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('frequency_id')->nullable();
            $table->foreign('frequency_id')
                    ->references('id')
                    ->on('frequencies')
                    ->onDelete('set null');
            $table->unsignedBigInteger('priority_id')->nullable();
            $table->foreign('priority_id')
                    ->references('id')
                    ->on('priorities')
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
        Schema::dropIfExists('maintenance_plans');
    }
}
