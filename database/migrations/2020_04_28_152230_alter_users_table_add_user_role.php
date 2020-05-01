<?php

use App\User;
use App\UserRoles;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AlterUsersTableAddUserRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('user_role_id')
                ->unsigned()
                ->after('id');
        });
        // set random password
        $password = Str::random(8);
        echo "Administrator password is: ".$password."\n";

        // create first admin
        $admin_user = new User();
        $admin_user->user_role_id = UserRoles::ADMIN;
        $admin_user->name = "admin";
        $admin_user->email = "admin@admin.com";
        $admin_user->password = Hash::make($password);
        $admin_user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_role_id');
        });
    }
}


