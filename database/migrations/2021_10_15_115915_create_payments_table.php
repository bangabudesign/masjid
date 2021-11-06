<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('method');
            $table->integer('amount')->default(0);
            $table->longText('notes')->nullable();
            $table->boolean('status')->default(0);
            $table->string('receipt')->nullable();
            $table->dateTime('confirm_at')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('paymentable_id');
            $table->string('paymentable_type');
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
        Schema::dropIfExists('payments');
    }
}
