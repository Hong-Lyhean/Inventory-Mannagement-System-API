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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("first_name", 40);
            $table->string("last _name", 40);
            $table->enum("gender", ["M", "F"])->default("M");
            $table->string("address", 255)->nullable();
            $table->integer("phone")->unique();
            $table->string("email", 255)->unique()->nullable();

            $table->unsignedBigInteger("staff_id")->nullable();
            $table->foreign("staff_id")
                ->references("id")
                ->on("staffs")
                ->cascadeOnUpdate()
                ->nullOnDelete();
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
        Schema::dropIfExists('customers');
    }
};
