<?php

class Base{

    public $db;

    public function __construct() {

        $this->db = new PDO("mysql:host=" .ENV["DB_HOST"].";dbname=".ENV["DB_NAME"].";charset=utf8mb4",
        ENV["DB_USER"],
        ENV["DB_PASSWORD"],
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC                  //isto evita que o array que o fetch faça venha numerico E associativo. Assim vem apenas associativo
            
        ]    
    );
    }

    /*
    public function isValidKey($api_key){

        $query = $this->db->prepare("
            SELECT
                user_id
            FROM
                users
            WHERE
                api_key = ?
        "); 

        $query->execute([
            $api_key
        ]);

        $user = $query->fetch();

        return !empty($user);        //se preenchido = true, se vazio =  false
    }
    */
}

?>