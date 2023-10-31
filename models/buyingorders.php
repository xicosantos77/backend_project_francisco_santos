<?php

require_once("base.php");

class BuyingOrders extends Base{

    public function createDetail($order_id, $item){

        $query = $this->db->prepare("
        INSERT INTO 
            buyingorders_details
            (order_id, product_id, quantity, price_each)
        VALUES
            (?,?,?,?)
        ");

        $query->execute([
            $order_id,
            $item["product_id"],
            $item["quantity"],
            $item["price"]
        ]);
    }

    public function createHeader($user_id, $payment_reference){
        $query = $this->db->prepare("
            INSERT INTO 
                buyingorders 
                (user_id, payment_reference)
            VALUES 
                (?,?)
        ");

        $query->execute([
            $user_id,
            $payment_reference
        ]);

        return $this->db->lastInsertId();
    }

    public function getPaymentRef(){
        return mt_rand(10000000000000, 99999999999999);
    }

    public function updateStatus($status, $order_id, $user_id){
        $query = $this->db->prepare("
            UPDATE
                buyingorders
            SET 
                status = ?
            WHERE
                order_id = ?
            AND
                user_id = ? 
        ");

        $query->execute([
            $status,
            $order_id,
            $user_id
        ]);
    }
}

?>