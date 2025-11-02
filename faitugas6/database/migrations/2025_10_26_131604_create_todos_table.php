<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('todo', function (Blueprint $table) {
            $table->engine = 'InnoDB'; 
            $table->increments('todo_id');
            $table->unsignedInteger('user_id');
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->date('due_date')->nullable();
            $table->enum('status', ['belum', 'selesai'])->default('belum');
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('todo');
    }
};
