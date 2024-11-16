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
        Schema::create('warehouse_to_warehouses', function (Blueprint $table) {
            $table->id();
            $table->string("Source", 20)->nullable(false);
            $table->foreign("Source")->references("WarehouseCode")->on("warehouses");
            $table->string("Dest", 20)->nullable(false);
            $table->foreign("Dest")->references("WarehouseCode")->on("warehouses");
            $table->string("Item", 20)->nullable(false);
            $table->foreign("Item")->references("ProductCode")->on("products");
            $table->integer("Quantity")->default(0);
            $table->date("Created")->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->date("Received");
            $table->tinyInteger("deleted")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse_to_warehouses');
    }
};
