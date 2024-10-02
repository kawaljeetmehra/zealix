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
       Schema::create('assign_stock', function (Blueprint $table) {
           $table->id(); // Auto-incrementing primary key
           $table->unsignedBigInteger('product_id'); // Foreign key for products
           $table->unsignedBigInteger('distributor_id'); // Foreign key for distributors
          
           $table->timestamps(); // Created at and updated at timestamps

           // Optional: Add foreign key constraints if applicable
           $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           $table->foreign('distributor_id')->references('id')->on('distributors')->onDelete('cascade');
       });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
       Schema::dropIfExists('assign_stock');
   }

};
