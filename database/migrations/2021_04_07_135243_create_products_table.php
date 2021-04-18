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
            $table->string('name')->default('');
            $table->string('slug')->default('');
            $table->mediumText('description')->default('');
            $table->unsignedBigInteger('qty')->default(0);
            $table->decimal('orp',10,2)->default(0);
            $table->decimal('price',10,2)->default(0);
            $table->string('sku')->default('');
            $table->string('image')->default('');
            $table->mediumText('tags')->default('');
            $table->string('pictures_id')->default('');
            $table->boolean('ship')->default(0);
            $table->boolean('status')->default(0);
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
