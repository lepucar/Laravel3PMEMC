<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreignId('brand_id')->nullable()->constrained('brands')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('color')->nullable();
            $table->string('code');
            $table->string('weight')->nullable();
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->string('image')->nullable();
            $table->text('description');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
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