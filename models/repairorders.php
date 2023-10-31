<?php

require_once("base.php");

class RepairOrders extends Base{

    public function createDetail($order_id, $item){

        $query = $this->db->prepare("
        INSERT INTO 
            repairorders_details
            (repair_order_id, repair_id, price_each)
        VALUES
            (?,?,?)
        ");

        $query->execute([
            $order_id,
            $item["product_id"],
            $item["price"]
        ]);
    }

    public function createHeader($user_id, $payment_reference){
        $query = $this->db->prepare("
            INSERT INTO 
                repairorders
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

    public function getAllRepairsByUserId($user_id){
        $query = $this->db->prepare("
        SELECT
            repairorders.repair_order_id,
            repairorders.order_date,
            repairorders.payment_date,
            repairorders.shipping_date,
            repairorders.status,
            repairorders.payment_reference,
            repairorders_details.price_each
        FROM
            repairorders
        INNER JOIN
            repairorders_details USING (repair_order_id)
        WHERE
            repairorders.user_id = ?
        ");

        $query->execute([
            $user_id
        ]);

        return $query->fetchAll();
    }

    public function updateStatus($status, $repair_order_id, $user_id){
        $query = $this->db->prepare("
            UPDATE
                repairorders
            SET 
                status = ?,
                payment_date = NOW()
            WHERE
                repair_order_id = ?
            AND
                user_id = ? 
        ");

        $query->execute([
            $status,
            $repair_order_id,
            $user_id
        ]);
    }
}

?>