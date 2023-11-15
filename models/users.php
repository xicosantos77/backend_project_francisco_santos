<?php

require_once("base.php"); 

class Users extends Base{

    public function getByEmail($email){

        $query = $this->db->prepare("
            SELECT
                user_id,
                name,
                password
            FROM
                users
            WHERE
                email = ?
        ");

        $query->execute([
            $email
        ]);

        return $query->fetch();
    }

    public function getById($user_id){

        $query = $this->db->prepare("
            SELECT
                name,
                email,
                street_address,
                city,
                postal_code,
                country,
                phone
            FROM
                users
            WHERE
                user_id = ?
        ");

        $query->execute([
            $user_id
        ]);

        return $query->fetch();
    }

    public function getAll(){

        $query = $this->db->prepare("
            SELECT
                user_id,
                name,
                email,
                street_address,
                city,
                postal_code,
                country,
                phone
            FROM
                users
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function updateUser($data, $user_id) {

        $query = $this->db->prepare("
            UPDATE 
                users
            SET
                name = ?,
                email = ?,
                street_address = ?,
                city = ?,
                postal_code = ?,
                country = ?,
                phone = ?
            WHERE 
                user_id = ?
        ");

        $query->execute([
            $data["name"],
            $data["email"],
            $data["street_address"],
            $data["city"],
            $data["postal_code"],
            $data["country"],
            $data["phone"],
            $user_id
        ]);
    }

    public function create($data){       //$data criada para ser um array e receber toda a info

        $api_key = bin2hex(random_bytes(16));

        $query = $this->db->prepare("
        INSERT INTO users
        (name, email, password, street_address, city, postal_code, country, phone, api_key)
        VALUES(?,?,?,?,?,?,?,?,?);
        ");

        $query->execute([
            $data["name"],
            $data["email"],
            password_hash($data["password"], PASSWORD_DEFAULT), //encripta a password automaticamente
            $data["street_address"],
            $data["city"],
            $data["postal_code"],
            $data["country"],
            $data["phone"],
            $api_key    //gera 32 caracteres (o mesmo que está na PHPMy ADmin) que vai corresponder a API Key
        ]);

        $data["user_id"] = $this->db->lastInsertId();
        $data["api_key"] = $api_key;

        return $data;
    }
}

?>