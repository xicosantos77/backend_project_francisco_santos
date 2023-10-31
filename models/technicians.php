<?php

require_once("base.php"); 

class Techs extends Base{

    public function getTechByEmail($email){

        $query = $this->db->prepare("
            SELECT
                tech_id,
                name,
                password
            FROM
                technicians
            WHERE
                email = ?
        ");

        $query->execute([
            $email
        ]);

        return $query->fetch();
    }
}