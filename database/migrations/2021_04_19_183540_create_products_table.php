<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256)->nullable()->comment('Product name');
            $table->text('memo')->nullable()->comment('Product memo');
            $table->bigInteger('price')->nullable()->comment('Product Price');
            $table->string('image', 256)->nullable()->comment('Product Image Link');
            $table->tinyInteger('is_sold')->default(0)->comment('sold: 1, unsold: 0');
            $table->integer('buyer_id')->nullable()->comment('Buyer ID');
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
        Schema::dropIfExists('products');
    }
}
