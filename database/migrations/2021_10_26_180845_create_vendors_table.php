<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('name');
            $table->string('username');
            $table->string('category');
            $table->text('about')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('website')->nullable();
            $table->string('instagram')->nullable();
            $table->bigInteger('whatsapp')->nullable();
            $table->datetime('verified_at')->nullable();
            $table->integer('status')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('vendors');
    }
}
