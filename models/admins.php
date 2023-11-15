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

    public function getById($admin_id){

        $query = $this->db->prepare("
            SELECT
                admin_id,
                name,
                email
            FROM
                admins
            WHERE
                admin_id = ?
        ");

        $query->execute([
            $admin_id
        ]);

        return $query->fetch();
    }

    public function getByEmail($email){

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

    public function getAll(){

        $query = $this->db->prepare("
            SELECT
                admin_id,
                name,
                email
            FROM
                admins
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function create($data){       //$data criada para ser um array e receber toda a info

        $query = $this->db->prepare("
        INSERT INTO admins
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

    public function updateAdmin($data, $admin_id) {
        $query = $this->db->prepare("
            UPDATE
                admins
            SET
                name = ?,
                email = ?
            WHERE
                admin_id = ?
        ");

        $query->execute([
            $data["name"],
            $data["email"],
            $admin_id
        ]);
    }

    public function deleteAdmin($admin_id) {
        $query = $this->db->prepare("
            DELETE FROM 
                admins
            WHERE 
                admin_id = ? 
        ");

        $query->execute([$admin_id]);
    }
}

