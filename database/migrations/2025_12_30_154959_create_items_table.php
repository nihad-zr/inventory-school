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
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // رقم تسلسلي لكل عنصر
            $table->string('product_id'); // id_custom من product
            $table->string('item_id')->unique(); // ID فريد لكل عنصر
            $table->string('etat')->default('good'); // الحالة
            $table->string('location')->default('قسم 1'); // المكان
            $table->timestamps();

            // مفتاح خارجي اختياري (لازم يكون id_custom في products فريد)
            // $table->foreign('product_id')->references('id_custom')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
