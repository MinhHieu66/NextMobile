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
        Schema::create('order_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_item_id')
                ->constrained('product_items')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('order_id')
                ->constrained('shop_orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer("qty");
            $table->decimal('price', 10, 2); // 10 chữ số, 2 chữ số thập phân
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_lines', function (Blueprint $table) {
            // Đầu tiên phải xóa các khóa ngoại
            $table->dropForeign(['product_item_id']);
            $table->dropForeign(['order_id']);
        });
        Schema::dropIfExists('order_lines');
    }
};
