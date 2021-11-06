<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_statements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('recording_at');
            $table->bigInteger('income')->default(0);
            $table->bigInteger('outcome')->default(0);
            $table->text('body')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_statements');
    }
}
