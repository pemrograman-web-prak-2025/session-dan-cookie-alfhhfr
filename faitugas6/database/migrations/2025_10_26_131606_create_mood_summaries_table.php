<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mood_summary', function (Blueprint $table) {
            $table->engine = 'InnoDB'; 
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->date('date');
            $table->integer('total_tasks')->default(0);
            $table->integer('completed_tasks')->default(0);
            $table->enum('average_mood', ['😊 Senang', '😐 Biasa', '😔 Sedih', '😡 Marah', '😴 Lelah'])->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mood_summary');
    }
};
