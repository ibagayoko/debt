<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_id');
            $table->double('amount');
            $table->text('description')->nullable();
            $table->enum('type', ['PAYE', 'CREDIT']);
            $table->timestamps();
            $table->date('date')->useCurrent();
            $table->time('time')->useCurrent();

    
            $table->unique(['account_id', 'date','time', 'type']);
            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('cascade');

           
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
