<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('is_admin')
                ->nullable();
            $table->string('name');
            $table->string('email')
                ->unique();
            $table->timestamp('email_verified_at')
                ->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Set email and random password for administrator
        $email = "admin@admin.com";
        $password = '123456789';

        echo "Administrator email is: ".$email."\n";
        echo "Administrator password is: ".$password."\n";

        // create first admin
        $admin_user = new User();
        $admin_user->is_admin = true;
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
        Schema::dropIfExists('users');
    }
}
