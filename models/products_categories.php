<?php

//trabalha com classes de objectos

require_once("base.php");

class Product_categories extends Base{

    public function get(){          //faz fetch das marcas dos produtos

        $query = $this->db->prepare("
            SELECT product_cat_id, name, image
            FROM product_categories
            WHERE parent_id IS NULL
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function getAllSubcategories($parent_id){    //faz fetch dos tipos de produtos

        $query = $this->db->prepare("
			SELECT 
				c1.product_cat_id,
				c1.name,
				c1.image,
				c2.name AS parent_name
			FROM
				product_categories c1
			INNER JOIN
                product_categories c2 ON(c1.parent_id = c2.product_cat_id)
			WHERE
				c1.parent_id = ?
		");
		
		$query->execute([
			$parent_id
		]);
		
		return $query->fetchAll();
    }

/*
	public function getAll(){

        $query = $this->db->prepare("
            SELECT product_cat_id, name, parent_id
            FROM product_categories
        ");

        $query->execute();

        return $query->fetchAll();
    }


	public function getDetail($parent_id){
		//left join para categories nulas 
		//left join da mesma tabela para se ir uscar o parent_id
		$query = $this->db->prepare("
			SELECT
				c1.product_cat_id,
				c1.name,
				c1.parent_id,
				c2.name AS parent_name
			FROM 
				product_categories AS c1
			LEFT JOIN 
				product_categories AS c2 ON(c1.parent_id = c2.product_cat_id)
			WHERE 
				c1.product_cat_id = ?
		");

		$query->execute([ $id ]);

		return $query->fetch();        //fetch simples porque o ID por categoria é único.
	}

    public function getSubcategories($parent_id) {

		$query = $this->db->prepare("
			SELECT 
				c1.product_cat_id,
				c1.name,
				c2.name AS parent_name
			FROM
				product_categories c1
			INNER JOIN
                product_categories c2 ON(c1.parent_id = c2.product_cat_id)
			WHERE
				c1.parent_id = ?
		");
		
		$query->execute([
			$parent_id
		]);
		
		return $query->fetchAll();
	}

	public function create($data) {

		$query = $this->db->prepare("
			INSERT INTO 
				product_categories
				(name, parent_id)
			VALUES
				(?,?)
		");

		$query->execute([
			$data["name"],
			$data["parent_id"]
		]);

		$data["category_id"] = intval( $this->db->lastInsertId() );

		return $data;
	}

	public function update($data, $id){

		$query = $this->db->prepare("
			UPDATE
				product_categories
			SET
				name = ?, 
				parent_id = ?
			WHERE
				product_cat_id = ?
		");

		$query->execute([
			$data["name"],
			$data["parent_id"],
			$id
		]);

		//$data["category_id"] = intval( $this->db->lastInsertId() );

		$data["product_cat_id"] = $id;

		return $data;

	}

	public function delete($id){

		$query = $this->db->prepare("
			DELETE FROM
				product_categories
			WHERE
				product_cat_id = ?
		"); 

		return $query->execute([$id]);
	}
*/
}

?>