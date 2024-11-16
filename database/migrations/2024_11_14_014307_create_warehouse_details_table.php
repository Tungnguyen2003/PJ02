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
        Schema::create('warehouse_details', function (Blueprint $table) {
            $table->string("WarehouseCode", 20)->nullable(false);
            $table->foreign("WarehouseCode")->references("WarehouseCode")->on("warehouses");
            $table->string("ProductCode", 20)->nullable(false);
            $table->foreign("ProductCode")->references("ProductCode")->on("products");
            $table->integer("Quantity")->default(0);
            $table->primary(["WarehouseCode", "ProductCode"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse_details');
    }
};
