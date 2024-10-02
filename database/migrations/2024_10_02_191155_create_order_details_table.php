<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Foreign key referencing orders table
            $table->string('batch_number'); // VARCHAR(255) NOT NULL
            $table->string('category'); // VARCHAR(255) NOT NULL
            $table->string('name'); // VARCHAR(255) NOT NULL
            $table->integer('stock_count'); // INT NOT NULL
            $table->decimal('mrp', 10, 2); // DECIMAL(10, 2) NOT NULL
            $table->timestamps(); // TIMESTAMP for created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
