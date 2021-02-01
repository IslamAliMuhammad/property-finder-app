<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('title', 70);
            $table->foreignId('apartment_type_id');
            $table->decimal('price', 10, 2, true);
            $table->unsignedTinyInteger('bedrooms');
            $table->unsignedTinyInteger('bathrooms');
            $table->unsignedSmallInteger('area');
            $table->unsignedTinyInteger('level');
            $table->boolean('is_furnished');
            $table->foreignId('payment_option_id');
            $table->boolean('for_sale');
            $table->string('description', 4096);
            $table->foreignId('city_id');
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
        Schema::dropIfExists('apartments');
    }
}
