<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */ public function up()
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Distributor name
            $table->string('contact_name'); // Contact person's name
            $table->string('email')->unique(); // Email address (unique)
            $table->string('geographic_coverage'); // Geographic coverage area
            $table->string('location'); // Location
            $table->string('shipping_location'); // Shipping location
            $table->text('terms_of_agreement'); // Terms of agreement
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distributors');
    }
};
