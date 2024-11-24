<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('delivery_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('shipping_full_name');
            $table->string('shipping_town_city');
            $table->string('shipping_state');
            $table->string('shipping_country');
            $table->string('shipping_postcode_zip');
            $table->string('shipping_street_address');
            $table->string('shipping_phone');
            $table->string('shipping_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_addresses');
    }
};
