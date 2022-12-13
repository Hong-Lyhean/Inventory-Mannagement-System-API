<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->double("unit_price", 8, 2);
            $table->integer("size");
            $table->integer("discount");
            $table->double("total");
            $table->date("date");

            $table->unsignedBigInteger("product_id")->nullable();
            $table->foreign("product_id")
                ->references("id")
                ->on("products")
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->unsignedBigInteger("order_id");
            $table->foreign("order_id")
                ->references("id")
                ->on("orders")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger("payment_id");
            $table->foreign("payment_id")
                ->references("id")
                ->on("payments")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
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
        Schema::dropIfExists('order_details');
    }
};
