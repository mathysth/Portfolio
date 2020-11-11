<?php
namespace School\Admin;

use School\Database\Database;

class Admin
{

    public static function getAdminTemporaryToken(){
        return Database::prepare("SELECT token FROM admin_temporary_token WHERE member_id = :id ",array(":id" => $_SESSION['memberId']), true,true);
    }

}