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
            $table->string("last _name", 40);
            $table->string("address", 255)->nullable();
            $table->integer("phone")->unique();
            $table->string("email", 255)->unique();
            $table->string("username", 80)->unique();
            $table->string("password",18);

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
