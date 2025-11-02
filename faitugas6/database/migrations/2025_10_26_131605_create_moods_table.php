<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('moods', function (Blueprint $table) {
            $table->engine = 'InnoDB'; 
            $table->increments('mood_id');
            $table->unsignedInteger('user_id');
            $table->enum('mood', ['😊 Senang', '😐 Biasa', '😔 Sedih', '😡 Marah', '😴 Lelah']);
            $table->text('note')->nullable();
            $table->date('mood_date')->default(DB::raw('CURRENT_DATE'));
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('moods');
    }
};
