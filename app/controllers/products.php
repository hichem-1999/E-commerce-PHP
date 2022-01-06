<?php
class products extends Controller {
    public function __construct() {
        $this->productModel = $this->model('MProducts');
    }
public function details(){
    $item_id=$_GET["id"];
    $data = [
        'id' => '',
        'name' => '',  
        'size' => '',
        'color' => '',
        'brand' => '',
        'categorie' => '',
        'image' => '',
        'status' => '',
        'qte' => ''
        
    ];
    
    $product=$this->productModel->getProductById($item_id);
    
    $data1=$this->productModel->getBrands();

    $data2=$this->productModel->getCategories();
    
    
    $data = [
        'id' => $product->id,
        'name' =>  $product->name,
        'size' =>  $product->size,
        'color' =>  $product->color,
        'brand' =>  $product->id_brand,
        'categorie' =>  $product->id_cat,
        'image' =>  $product->img,
        'status' =>  $product->product_status,
        'qte' =>  $product->qte,

    ];

    $this->view('shopDetails',$data ,$data1,$data2);

}


    
}





