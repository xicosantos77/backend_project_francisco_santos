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

    public function getAllOrdersByUserId($user_id){
        $query = $this->db->prepare("
            SELECT
                buyingorders.order_id,
                buyingorders.order_date,
                buyingorders.payment_date,
                buyingorders.shipping_date,
                buyingorders.status,
                buyingorders.payment_reference,
                buyingorders_details.price_each,
                products.name
            FROM
                buyingorders
            INNER JOIN
                buyingorders_details USING (order_id)
            INNER JOIN
                products USING (product_id)
            WHERE
                buyingorders.user_id = ?
        
        ");

        $query->execute([
            $user_id
        ]);

        return $query->fetchAll();
    }

    //utilizado pelo botao de confirmação de encomenda
    //confirma o pagamento de AP para EP e marca o datastamp de pagamento
    public function updateStatus($status, $order_id, $user_id){
        $query = $this->db->prepare("
            UPDATE
                buyingorders
            SET 
                status = ?,
                payment_date = NOW()
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