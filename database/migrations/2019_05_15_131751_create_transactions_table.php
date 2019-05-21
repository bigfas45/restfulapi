<?php

use App\Transactions;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatetransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity')->unsigned();
            $table->integer('buyer_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
            $table->softDeletes();

            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
