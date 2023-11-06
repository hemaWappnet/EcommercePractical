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
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id')->references('id')->on('product_categories');
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();
            $table->softDeletes();        
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
