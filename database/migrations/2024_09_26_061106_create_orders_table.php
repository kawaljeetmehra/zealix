<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('order_date');
            $table->string('order_id')->unique();
            $table->decimal('total_cost', 10, 2);
            $table->string('location');
            $table->string('distributor_name');
            $table->string('order_by');
            $table->enum('order_status', ['Accept','Decline']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
