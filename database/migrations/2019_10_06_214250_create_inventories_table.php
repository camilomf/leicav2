<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('serialnumber')->unique();
            $table->string('sku')->unique();
            $table->integer('price')->nullable();
            $table->text('technical_specifications')->nullable();
            $table->text('description')->nullable();
            $table->text('observation')->nullable();
            //state
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')
                    ->references('id')
                    ->on('states')
                    ->onDelete('set null');
            //place
            $table->unsignedBigInteger('place_id')->nullable();
            $table->foreign('place_id')
                    ->references('id')
                    ->on('places')
                    ->onDelete('set null');
            //category
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('set null');
            //model
            $table->unsignedBigInteger('model_id')->nullable();
            $table->foreign('model_id')
                    ->references('id')
                    ->on('modelos')
                    ->onDelete('set null');
            //maintenance_plan
            $table->unsignedBigInteger('maintenance_plan_id')->nullable();
            $table->foreign('maintenance_plan_id')
                    ->references('id')
                    ->on('maintenance_plans')
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
        Schema::dropIfExists('inventories');
    }
}
