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
        Schema::create('sales_details', function (Blueprint $table) {
            $table->id();
            $table->integer('sales_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->timestamps(); // This line creates 'created_at' and 'updated_at' columns
            $table->unsignedBigInteger('created_by'); // Use unsignedBigInteger for user IDs
            $table->unsignedBigInteger('updated_by'); // Use unsignedBigInteger for user IDs
            $table->decimal('amount_total', 15, 2);


        });
        Schema::table('sales_details', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};