<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserTableForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('employee_id')
                ->unique()
                ->unsigned()
                ->nullable()
                ->after("id");
            $table->bigInteger('customer_id')
                ->unique()
                ->unsigned()
                ->nullable()
                ->after("employee_id");

            $table->foreign('employee_id', "employee_user_foreign")
                ->references('id')
                ->on('employees')
                ->onDelete("set null");

            $table->foreign('customer_id', 'customer_user_foreign')
                ->references('id')
                ->on('customers')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign("employee_user_foreign");
            $table->dropForeign("customer_user_foreign");
            $table->dropColumn("employee_id");
            $table->dropColumn("customer_id");
        });
    }
}
