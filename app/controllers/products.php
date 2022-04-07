<?php
class products extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('MProducts');
        
    }
    public function details()
    {
        $item_id = $_GET["id"];
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

        $product = $this->productModel->getProductById($item_id);

        $data1 = $this->productModel->getBrands();

        $data2 = $this->productModel->getCategories();


        $data = [
            'id' => $product->id,
            'price' => $product->price,
            'name' =>  $product->name,
            'size' =>  $product->size,
            'color' =>  $product->color,
            'brand' =>  $product->id_brand,
            'categorie' =>  $product->id_cat,
            'image' =>  $product->img,
            'status' =>  $product->product_status,
            'qte' =>  $product->qte,
        ];

        $id1 = $product->id_cat;
        $id2 = $product->id_brand;

        $this->view('shopDetails', $data, $data1, $data2, $id1, $id2);
    }
    public function sortByPrice()
    {
        $categorie = $this->productModel->getCategories();
        $products = $this->productModel->getProductsByPrice();
        $brands = $this->productModel->getBrands();
        $data = ['products' => $products, 'categorie' => $categorie, 'brands' => $brands];
        $this->view('shop', $data);
    }
    public function getProductsByCategory()
    {
        $id = $_GET['id'];
        $categorie = $this->productModel->getCategories();
        $products = $this->productModel->getByCategorie($id);
        $brands = $this->productModel->getBrands();
        $data = ['products' => $products, 'categorie' => $categorie, 'brands' => $brands];
        $this->view('shop', $data);
    }
}
