<?php

require_once("base.php");

class ProductRepairPrices extends Base{

    public function getPriceByProductAndRepair($id){          //faz fetch das marcas dos produtos

        $query = $this->db->prepare("
            SELECT
                products.name AS product_name,
                repair_categories.name AS repair_category_name,
                product_repair_prices.price
            FROM
                product_repair_prices
            JOIN
                products USING (product_id)
            JOIN
                repair_categories USING (repair_cat_id)
            WHERE
                product_repair_prices.product_id = ? 
                AND 
                product_repair_prices.repair_cat_id = ?;
        ");

        $query->execute([ 
            $id["product_id"], 
            $id["repair_cat_id"]
        ]);

        return $query->fetch();
    }


}