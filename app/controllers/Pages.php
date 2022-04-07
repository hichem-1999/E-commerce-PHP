<?php
class Pages extends Controller
{
    public function __construct()
    {
        $this->productsModel = $this->model('MProducts');
    }

    public function index()
    {
        $products = $this->productsModel->getProducts();
        $data = ['products' => $products];
        $this->view('index', $data);
        
    }

    public function shop()
    {
        $categorie = $this->productsModel->getCategories();
        $products = $this->productsModel->getProducts();
        $brands = $this->productsModel->getBrands();
        $data = ['products' => $products, 'categorie' => $categorie, 'brands' => $brands];
        $this->view('shop', $data);
        
       
    }
    public function about()
    {
        $this->view('about');
    }
   
   
    public function contact()
    {
        $this->view('contact');
    }
    public function main()
    {
        $this->view('main');
    }
    public function shopDetails()
    {
        $this->view('shopDetails');
    }
    public function shopCart()
    {
        $this->view('shopCart');
    }
    
    
    

  
}
