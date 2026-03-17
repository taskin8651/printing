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
    Schema::table('products', function (Blueprint $table) {

        $table->string('sku')->unique()->after('name');
        $table->integer('stock')->default(0)->after('price');

        $table->boolean('is_featured')->default(0);

        $table->string('meta_title')->nullable();
        $table->text('meta_description')->nullable();

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
