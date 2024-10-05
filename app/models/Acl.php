<?php

namespace Models;

use Core\Helper\DB;
use Core\Helper\Security;

class Acl
{
    public static function getAclByRole(string $id_role): array
    {
        $sql = "
            SELECT acl_resources.*, acl_privileges.allow
            FROM acl_privileges 
            JOIN acl_resources ON acl_resources.id = acl_privileges.id_resource 
            WHERE acl_privileges.id_role = :id_role;
        ";
        $params = ["id_role" => $id_role];
        $acl = DB::query($sql, $params);

        return $acl;
    }
}