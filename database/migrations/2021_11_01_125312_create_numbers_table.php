<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numbers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('maiden_name')->nullable();
            $table->string('phone_number');
            $table->string('mobile_number')->nullable();
            $table->date('birthday')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('occupation')->nullable();
            $table->string('url')->nullable();
            $table->string('other_names')->nullable();
            $table->longText('notes')->nullable();
            $table->boolean('isFavourite')->nullable();
            $table->boolean('isImportant')->nullable();
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
        Schema::dropIfExists('numbers');
    }
}
