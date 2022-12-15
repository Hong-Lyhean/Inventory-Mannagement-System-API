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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string("staff_id", 20)->unique();
            $table->string("first_name", 40);
            $table->string("last_name", 40);
            $table->enum("gender", ["M", "F"])->default("M");
            $table->date("birthday")->nullable();
            $table->string("address", 255)->nullable();
            $table->integer("phone")->unique();
            $table->string("email", 255)->unique()->nullable();
            $table->string("username", 80)->unique();
            $table->string("image")->nullable();
            $table->string("password");

            $table->unsignedBigInteger("role_id")->nullable();
            $table->foreign("role_id")
                ->references("id")
                ->on("roles")
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
        Schema::dropIfExists('staff');
    }
};
