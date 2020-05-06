<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('customer_id')
                ->unsigned();
            $table->bigInteger('service_type_id')
                ->unsigned();
            $table->bigInteger('employee_id')
                ->unsigned();
            $table->float('price')
                ->nullable();
            $table->timestamps();


            $table->foreign('customer_id', 'customer_service_foreign')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');

            $table->foreign('service_type_id', "service_type_service_foreign")
                ->references('id')
                ->on('service_types')
                ->onDelete("cascade");

            $table->foreign('employee_id', "employee_service_foreign")
                ->references('id')
                ->on('employees')
                ->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
