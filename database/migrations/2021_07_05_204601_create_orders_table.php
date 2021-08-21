<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->decimal('subtotal',10,2);
            $table->decimal('discount',10,2);
            $table->decimal('tax',10,2);
            $table->decimal('total',10,2);
            $table->decimal('shipping_fee',10,2)->nullable();
            $table->mediumText('message')->default('Your order is on process.');
            $table->enum('status', ['pending', 'confirmed','shipped','delivered','cancelled', 'refunded'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
