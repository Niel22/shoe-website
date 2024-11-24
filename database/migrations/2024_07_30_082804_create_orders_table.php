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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); // User ID for the user making the order
            $table->string('tracking_no'); // Tracking number for the order
            $table->string('reference')->nullable(); // Tracking number for the order
            $table->string('payment_status'); // Tracking number for the order
            $table->string('full_name'); // First Name
            $table->string('total_price'); // First Name
            $table->string('street_address'); // Street address
            $table->string('town_city'); // Town / City
            $table->string('country'); // State / County
            $table->string('state'); // State / County
            $table->string('postcode_zip'); // Postcode ZIP
            $table->string('phone'); // Phone
            $table->string('email'); // Email address
            $table->string('payment_mode');
            $table->string('payment_id')->nullable();
            $table->string('status_message');
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
