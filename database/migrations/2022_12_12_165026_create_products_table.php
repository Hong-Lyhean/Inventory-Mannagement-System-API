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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100)->unique();
            $table->string("image")->nullable();
            $table->string("description", 255)->nullable();
            $table->string("unit", 80);
            $table->double("price", 8, 2);
            $table->enum("currency",["USD", "KHR"])->default("USD");
            $table->integer("quantity");
            $table->enum("status", [0, 1])->default(0);
            $table->string("other_details", 255)->nullable();

            $table->unsignedBigInteger("supplier_id")->nullable();
            $table->foreign("supplier_id")
                ->references("id")
                ->on("suppliers")
                ->nullOnDelete()
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
        Schema::dropIfExists('products');
    }
};
