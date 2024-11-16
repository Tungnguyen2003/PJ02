<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->string("ProductCode", 20)->nullable(false)->primary();
            $table->string("ProductName", 40)->nullable(false)->unique();
            $table->string("Image", 100)->nullable(false);
            $table->string("Unit", 20)->nullable(false);
            $table->string("ManufNation", 40);
            $table->integer("Price")->unsigned();
            $table->text("Description");
            $table->string("CategoryCode", 20)->nullable(false);
            $table->foreign("CategoryCode")->references("CategoryCode")->on("categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
