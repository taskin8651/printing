<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();

        // ❌ user_id hata diya

        $table->string('order_number')->unique();

        // ✅ CUSTOMER DETAILS
        $table->string('name');
        $table->string('email')->nullable();
        $table->string('phone');
        $table->text('address');

        $table->decimal('total_amount', 10, 2);

        $table->string('status')->default('pending');

        $table->timestamps();
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
