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

    public function getById($tech_id){

        $query = $this->db->prepare("
            SELECT
                technicians.tech_id,
                technicians.name,
                technicians.email,
                technicians.store_id,
                stores.name AS store_name
            FROM
                technicians
            INNER JOIN
                stores
            WHERE
                tech_id = ?
        ");

        $query->execute([
            $tech_id
        ]);

        return $query->fetch();
    }

    public function updateTech($data, $tech_id) {
        $query = $this->db->prepare("
            UPDATE
                technicians
            SET
                name = ?,
                email = ?,
                store_id = (SELECT store_id FROM stores WHERE name = ?)
            WHERE
                tech_id = ?
        ");

        $query->execute([
            $data["name"],
            $data["email"],
            $data["store_name"],
            $tech_id
        ]);
    }
}