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
    Schema::create('order_items', function (Blueprint $table) {
        $table->id();

        $table->foreignId('order_id')->constrained()->cascadeOnDelete();
        $table->foreignId('product_id')->constrained()->cascadeOnDelete();

        // 🔥 snapshot fields (IMPORTANT)
        $table->string('product_name'); 
        $table->string('sku')->nullable();

        // 💰 pricing
        $table->integer('quantity');
        $table->decimal('price', 10, 2); // per unit
        $table->decimal('total', 10, 2); // quantity * price

        // 🎨 variants
        $table->string('variant')->nullable(); 
        // example: "Size:M, Color:Red"

        // 📦 extra (optional but useful)
        $table->text('notes')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
