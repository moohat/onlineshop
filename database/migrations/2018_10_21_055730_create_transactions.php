<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactions extends Migration
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
            $table->string('transaction_code',12);
            $table->integer('user_id')->unsigned();
            $table->decimal('total',15,2)->unsigned();
            $table->datetime('date_transaction')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('status_payment',['waiting','success','cancel'])->default('waiting');
            $table->boolean('prof_of_payment')->default(false);
            $table->timestamps();


             $table->foreign('user_id')->references('id')->on('users');
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
