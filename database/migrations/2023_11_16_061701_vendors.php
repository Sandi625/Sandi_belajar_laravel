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
            Schema::create('vendors', function (Blueprint $table) {
                $table->id();
                $table->string('code');
                $table->string('name');
                $table->string('phone_number');
                $table->string('email');
                $table->string('address');
                $table->timestamps(); // This line creates 'created_at' and 'updated_at' columns
                $table->unsignedBigInteger('created_by');
                $table->unsignedBigInteger('updated_by');
                $table->enum('is_active', ['1', '0']);
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
