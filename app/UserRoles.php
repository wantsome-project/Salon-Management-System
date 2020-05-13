<?php

namespace App;

class UserRoles
{
    const ADMIN = 50;
    const EMPLOYEE = 30;
    const CUSTOMER = 10;

    public static function getUserRoles()
    {
        return [
            self::ADMIN => "admin",
            self::EMPLOYEE => "employee",
            self::CUSTOMER => "customer",
        ];
    }

    public static function getUserRole($id)
    {
        $role_id = UserRoles::getUserRoles();
        return $role_id[$id]??null;
    }
}
