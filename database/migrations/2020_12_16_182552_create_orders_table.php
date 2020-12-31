<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->enum('payment_method', ['bkash', 'cash on delivery']);
            $table->string('trx_id')->nullable();
            $table->longText('address');
            $table->string('zip_code');
            $table->string('total');
            $table->string('discount')->nullable();
            $table->longText('notes')->nullable();
            $table->enum('status', ['processing', 'pending', 'cancelled', 'delivered'])->default('pending');
            $table->enum('notification', ['seen', 'unseen'])->default('unseen');
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
        Schema::dropIfExists('orders');
    }
}
