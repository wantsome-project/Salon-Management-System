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
            $table->tinyInteger('role_id')
                ->unsigned()
                ->after('id');
        });

        // Set email and random password for administrator
        $email = "admin@admin.com";
        $password = Str::random(8);

        echo "Administrator email is: ".$email."\n";
        echo "Administrator password is: ".$password."\n";

        // create first admin
        $admin_user = new User();
        $admin_user->role_id = UserRoles::ADMIN;
        $admin_user->name = "admin";
        $admin_user->email = $email;
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
            $table->dropColumn('role_id');
        });
    }
}


