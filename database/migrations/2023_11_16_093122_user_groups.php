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
        Schema::create('user_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name');
            $table->timestamps(); // This line creates 'created_at' and 'updated_at' columns
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->enum('is_active', ['1', '0']);
            $table->string('description');
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
