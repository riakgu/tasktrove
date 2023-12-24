<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id("task_id");
            $table->unsignedBigInteger("user_id");
            $table->string("task_name",100);
            $table->text("description");
            $table->date("started");
            $table->date("deadline");
            $table->enum("status", ["TO_DO", "IN_PROGRESS", "DONE"]);
            $table->timestamps();
            $table->foreign("user_id")->references("user_id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
