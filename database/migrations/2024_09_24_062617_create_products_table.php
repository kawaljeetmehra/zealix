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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->date('manufacturing_date');
            $table->date('expiry_date');
            $table->string('batch_number');
            $table->string('packaging');
            $table->integer('stock_count');
            $table->string('category');
            $table->integer('quantity');
            $table->string('quantity_unit');
            $table->decimal('mrp', 8, 2);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
