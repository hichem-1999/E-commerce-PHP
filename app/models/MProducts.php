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
		
		$this->db->query("SELECT products.id, products.name, products.price, products.size,products.color, products.id_cat, products.img,  products.id_brand,products.product_status, products.qte,categorie.name as categorie
        FROM products
        LEFT JOIN categorie
        ON products.id_cat = categorie.id
		WHERE products.id_cat=:id");
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
    public function getProductsByPrice(){
        $this->db->query('SELECT * FROM products ORDER BY price ASC');
        $result = $this->db->resultSet();
        return $result;

    }

    public function getprod($action,$brand,$cat,$min,$max,$recherche){
            
            
        if(!empty($action)){

            $sql='SELECT * FROM products where state = 0 and price between '.$min.' AND '.$max.' ';
            if(!empty($brand)){
                $brands = implode("','", $brand);
          
            
                
            
                $sql.="and id_brand in('".$brands."')";
                
                
            }
            if(!empty($cat)){
                $cats = implode("','", $cat);
          
                
            
                $sql.="and id_cat in('".$cats."')";
                
                
            }
            if(!empty($recherche)){

                $sql.="and name like '%".$recherche."%'";
                

            }
           
        }
       
        $this->db->query($sql);
    
       

         
        return ($this->db->resultSet());
        
      
       
    }

}

