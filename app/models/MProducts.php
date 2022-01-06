<?php
class MProducts
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /* Test (database and table needs to exist before this works)*/
    public function getProducts()
    {
        $this->db->query("SELECT * FROM products");

        $result = $this->db->resultSet();

        return $result;
    }
    public function getCategories()
    {
        $this->db->query("SELECT * FROM categorie");

        $result = $this->db->resultSet();

        return $result;
    }

    public function getBrands()
    {
        $this->db->query("SELECT * FROM brand");

        $result = $this->db->resultSet();

        return $result;
    }

    public function getByCategorie ($id){
		
		$this->db->query("SELECT products.id, products.name, products.name,products.name,products.price,products.size,products.color,products.products.id_cat, categorie.id,categorie.name as categorie
				FROM produit
				LEFT JOIN categorie
				ON products.products.id_cat = categorie.id
				WHERE products.products.id_cat=:id");
		//$sql = "SELECT * FROM produit WHERE code_categorie=?";

        $this->db->bind(':id', $id);
        $result = $this->db->resultSet();

        return $result;

        
		
	}
    public function getProductById($id){
        $this->db->query('SELECT * FROM products WHERE id = :id');
        //Bind value
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        
        return($row);    

    }
}

