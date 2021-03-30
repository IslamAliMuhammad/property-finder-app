<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title', 70);
            $table->foreignId('land_type_id')->constrained()->onDelete('cascade');
            $table->decimal('price', 10, 2, true);
            $table->integer('area');
            $table->foreignId('payment_option_id')->nullable()->constrained()->onDelete('cascade');
            $table->boolean('for_sale');
            $table->string('description', 4096);
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->string('address');
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
        Schema::dropIfExists('lands');
    }
}
