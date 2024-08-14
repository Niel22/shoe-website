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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();

            $table->string('name');
            $table->string('slug');
            $table->text('small_description');
            $table->text('description');

            $table->integer('original_price');
            $table->integer('selling_price');
            $table->integer('quantity');
            $table->boolean('trending')->default(0);
            $table->boolean('status')->default(0);

            $table->string('meta_title');
            $table->text('meta_keyword');
            $table->text('meta_description');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
