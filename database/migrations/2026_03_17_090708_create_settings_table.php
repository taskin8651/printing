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
    Schema::create('settings', function (Blueprint $table) {
        $table->id();

        // basic
        $table->string('site_name')->nullable();
        $table->string('phone')->nullable();
        $table->string('email')->nullable();
        $table->text('address')->nullable();

        // social
        $table->string('facebook')->nullable();
        $table->string('instagram')->nullable();
        $table->string('youtube')->nullable();
        $table->string('twitter')->nullable();
        $table->string('linkedin')->nullable();
        $table->string('whatsapp')->nullable();

        // seo
        $table->string('meta_title')->nullable();
        $table->text('meta_description')->nullable();

        // footer
        $table->text('footer_text')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
