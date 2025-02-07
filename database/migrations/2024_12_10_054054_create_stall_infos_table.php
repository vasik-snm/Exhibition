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
        Schema::create('stall_infos', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');  // Contact Name
            $table->string('store_name');    // Store Name
            $table->text('user_address');         // Address
            $table->string('user_city');          // City
            $table->string('user_zip_code');      // Zip Code
            $table->string('user_phone');  // Phone Number
            $table->string('user_whatsapp')->nullable();  // WhatsApp Number
            $table->string('user_email')->unique();  // Email
            $table->string('user_collection'); // Collection Type
            $table->string('user_insta_id')->nullable();  // Instagram ID
            $table->enum('main_option', ['clothing', 'food']);  // Main Option
            $table->enum('stall_type', ['Large Table', 'Medium Table', 'Single Table'])->nullable();  // Stall Option (Clothing/Food)
            $table->enum('food_option', ['Large Table', 'Medium Table'])->nullable();
            $table->enum('extra_requirement', ['Yes', 'No'])->default('No');  // Extra Option (Yes/No
            $table->string('extra_requirement_details')->nullable();  // Extra Option Name
            $table->enum('promo_code', ['Yes', 'No'])->default('No');  // Promo Code
            $table->string('Promo_code_details')->nullable();  // Promo Code
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stall_infos');
    }
};
