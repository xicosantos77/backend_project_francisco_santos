<?php

require_once("base.php"); 

class Techs extends Base{

    public function getAll(){

        $query = $this->db->prepare("
            SELECT
                tech_id,
                name,
                email
            FROM
                technicians
        ");

        $query->execute();

        return $query->fetchAll();
    }

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

    public function getByEmail($email){

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

    public function create($data){       //$data criada para ser um array e receber toda a info

        $query = $this->db->prepare("
        INSERT INTO technicians
        (name, email, password)
        VALUES(?,?,?);
        ");

        $query->execute([
            $data["name"],
            $data["email"],
            password_hash($data["password"], PASSWORD_DEFAULT), //encripta a password automaticamente
        ]);

        $data["user_id"] = $this->db->lastInsertId();


        return $data;
    }

    public function updateTech($data, $tech_id) {
        $query = $this->db->prepare("
            UPDATE
                technicians
            SET
                name = ?,
                email = ?
            WHERE
                tech_id = ?
        ");

        $query->execute([
            $data["name"],
            $data["email"],
            $tech_id
        ]);
    }

    public function deleteTech($tech_id) {
        $query = $this->db->prepare("
            DELETE FROM 
                technicians
            WHERE 
                tech_id = ? 
        ");

        $query->execute([$tech_id]);
    }
}