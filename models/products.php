<?php

//trabalha com classes de objectos

require_once("base.php");

class Products extends Base{

    public function get(){          //faz fetch das marcas dos produtos

        $query = $this->db->prepare("
            SELECT 
                product_cat_id, name, image
            FROM 
                product_categories
            WHERE 
                parent_id IS NULL
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function getDetails($id){    //faz fetch dos tipos de produtos

        $query = $this->db->prepare("
            SELECT 
                products.product_id,
                products.name,
                products.description,
                products.price,
                products.stock,
                products.image
            FROM
                products
            INNER JOIN 
                product_categories ON products.product_cat_id = product_categories.product_cat_id
            WHERE
                product_categories.product_cat_id = ?
		");
		
		$query->execute([
			$id
		]);
		
		return $query->fetchAll();
    }

    public function getProductById($id){    //faz fetch dos tipos de produtos

        $query = $this->db->prepare("
            SELECT 
                product_id,
                name,
                description,
                price,
                stock,
                image
            FROM
                products
            WHERE
                product_id = ?
		");
		
		$query->execute([
			$id
		]);
		
		return $query->fetchAll();
    }

    public function getRepairById($id){    //faz fetch das reparações por produto selecionado

        $query = $this->db->prepare("
        SELECT
            products.product_id,
            products.name,
            product_repair_prices.repair_cat_id,
            repair_categories.name,
            repair_categories.image,
            product_repair_prices.price
        FROM
            products
        JOIN
            product_repair_prices USING (product_id)
        JOIN
            repair_categories USING (repair_cat_id)
        WHERE
            products.product_id = ?
		");
		
		$query->execute([
			$id
		]);
		
		return $query->fetchAll();
    }
}