<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone', 20)
                ->nullable();
            $table->bigInteger('service_type_id')
                ->unsigned();
            $table->string('payroll')
                ->nullable();
            $table->string('photo_name')
                ->nullable();
            $table->timestamps();

            $table->foreign('service_type_id', "service_type_employee_foreign")
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
        Schema::dropIfExists('employees');
    }
}
