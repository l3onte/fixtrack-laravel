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
        Schema::create('work_order_images', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('work_order_id')
                  ->constrained('work_orders') 
                  ->onDelete('cascade');
            
            $table->string('file_path');
            $table->enum('type', ['before', 'after']);
            
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_order_images');
    }
};
