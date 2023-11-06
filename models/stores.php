<?php

require_once("base.php");

class Stores extends Base{

    public function get(){

        $query = $this->db->prepare("
            SELECT 
                store_id, 
                name
            FROM 
                stores
        "); 

        $query->execute();

        return $query->fetchAll();
    }

}

?>