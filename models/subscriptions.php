<?php

require_once("base.php"); 

class Subscriptions extends Base{

    public function getByEmail($email){

        $query = $this->db->prepare("
            SELECT
                name,
                email
            FROM
                subcriptions
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
        INSERT INTO subcriptions
        (email, name)
        VALUES(?,?);
        ");

        $query->execute([
            $data["email"],
            $data["name"]
        ]);

        return $data;
    }
}

?>