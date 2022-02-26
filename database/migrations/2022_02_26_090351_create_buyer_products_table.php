<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')->constrained('buyers')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('product_id')->constrained('products')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('admin_created_id')->nullable()->constrained('users')
                ->onCreate('cascade');
            $table->foreignId('admin_updated_id')->nullable()->constrained('users')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyer_products');
    }
}
