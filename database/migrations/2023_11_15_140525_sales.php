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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->date('trx_date');
            $table->decimal('sub_amount', 15, 2);
            $table->decimal('amount_total', 15, 2);
            $table->decimal('discount_amount', 15, 2);
            $table->timestamps();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->integer('total_products');
            $table->unsignedBigInteger('customer_id');
            $table->text('description');
        });

    Schema::table('sales', function (Blueprint $table) {
        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict')->onUpdate('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
