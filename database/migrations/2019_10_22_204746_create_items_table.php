<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serialnumber');
            $table->string('price')->nullable();
            $table->text('detail')->nullable();
            $table->unsignedBigInteger('modelo_id')->nullable();
            $table->foreign('modelo_id')
                ->references('id')
                ->on('modelos')
                ->onDelete('set null');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('set null');
            $table->unsignedBigInteger('inventory_id')->nullable();
            $table->foreign('inventory_id')
                ->references('id')
                ->on('inventories')
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
        Schema::dropIfExists('items');
    }
}
