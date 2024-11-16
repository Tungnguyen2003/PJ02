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
        Schema::create('employees', function (Blueprint $table) {
            $table->string("EmployeeCode", 20)->primary();
            $table->string("password", 60)->nullable(false);
            $table->string("email", 100)->nullable(false);
            $table->string("FullName", 40)->nullable(false);
            $table->string("Phone", 20)->nullable(false);
            $table->dateTime("Worked");
            $table->integer("Group");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
