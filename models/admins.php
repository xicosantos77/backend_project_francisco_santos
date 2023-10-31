<?php

require_once("base.php"); 

class Admins extends Base{

    public function getAdminByEmail($email){

        $query = $this->db->prepare("
            SELECT
                admin_id,
                name,
                password
            FROM
                admins
            WHERE
                email = ?
        ");

        $query->execute([
            $email
        ]);

        return $query->fetch();
    }
}