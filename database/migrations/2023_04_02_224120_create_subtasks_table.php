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
        Schema::create('subtasks', function (Blueprint $table) {
            $table->id();
            $table->string('activity', 45)->index();
            $table->text('description')->nullable();
            $table->integer('duration');
            $table->integer('priority');
            $table->string('status');
            $table->integer('progress')->nullable();

            $table->date('start_at')->nullable();
            $table->time('start_time')->nullable();
            $table->date('end_at')->nullable();
            $table->time('end_time')->nullable();

            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade');

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
        Schema::dropIfExists('subtasks');
    }
};
