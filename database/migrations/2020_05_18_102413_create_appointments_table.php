<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('customer_id')
                ->unsigned();
            $table->bigInteger('employee_id')
                ->unsigned();
            $table->bigInteger('service_type_id')
                ->unsigned();
            $table->text('status')
                ->nullable();
            $table->dateTime('appointment_time')
                ->nullable();
            $table->date('appointment_date')
                ->nullable();
            $table->timestamps();

            $table->foreign('customer_id', 'customer_appointment_foreign')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');

            $table->foreign('employee_id', 'employee_appointment_foreign')
                ->references('id')
                ->on('employees')
                ->onDelete("cascade");

            $table->foreign('service_type_id', 'service_type_appointment_foreign')
                ->references('id')
                ->on('service_types')
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
        Schema::dropIfExists('appointments');
    }
}
