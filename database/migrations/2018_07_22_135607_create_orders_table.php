<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateOrdersTable extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference');
            $table->integer('amount');
            $table->integer('status')->default(3)->comment('3 - New Order, 2 - Sewing, 1 - Completed, 0 -Shipped');
            $table->date('completion_date');
            $table->string('delivery_address');
            $table->integer('user_id');
            $table->integer('tailor_id');
            $table->integer('design_id');
            $table->softDeletes();
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
