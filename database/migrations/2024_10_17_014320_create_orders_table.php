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
        Schema::create('orders', function (Blueprint $table) {
            $table->string("OrderNumber", 20)->primary();
            $table->dateTime("OrderCreated")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string("CustomerCode", 20)->nullable(false);
            $table->foreign("CustomerCode")->references("CustomerCode")->on("customers");
            $table->string("EmployeeCode", 20)->nullable(false);
            $table->foreign("EmployeeCode")->references("EmployeeCode")->on("employees");
            $table->integer("Total")->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
