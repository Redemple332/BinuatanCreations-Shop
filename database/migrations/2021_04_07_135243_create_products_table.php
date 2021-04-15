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
            $table->id()->from('2021000');
            $table->string('product')->default('');
            $table->mediumText('description')->default('');
            $table->integer('quantity')->default(0);
            $table->double('original_price')->default(0);
            $table->double('product_price')->default(0);
            $table->foreignId('category_id');
            $table->string('image')->default('');
            $table->boolean('status')->default(0);
            $table->boolean('ship')->default(0);
            $table->boolean('new')->default(0);
            $table->foreignId('color_id');
            $table->foreignId('size_id');
            $table->string('gender')->default('');
            $table->string('namecode')->default('');
            $table->mediumText('tags')->default('');
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
