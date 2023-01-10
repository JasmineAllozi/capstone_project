<?php

namespace Core\Helpers;

use Core\Model\User;

class Helper
{

     /**
    * redirect the user to the given URL 
    *
    *@param string $url
    * @return void
    */ 
    public static function redirect(string $url): void
    {
        header("Location: $url");
    }
     /**
    * check if given permissions in the user array permissions
    *
    *@param array $permissions_set
    * @return boolean
    */ 
    public static function check_permission(array $permissions_set): bool
    {
        $display = true;

        if (!isset($_SESSION['user'])) {
            return false;
        }

        $user = new User;
        $assigned_permissions = $user->get_permissions();
        foreach ($permissions_set as $permission) {
            if (!in_array($permission, $assigned_permissions)) {
                return false;
            }
        }
        return $display;
    }
}