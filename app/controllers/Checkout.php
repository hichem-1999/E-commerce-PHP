<?php
class Checkout extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('MProducts');
        $this->checkoutModel = $this->model('MCheckout');
    }

    public function getOrders()
    {
        if ((isset($_SESSION["cart"]))) {
            $i = 0;
          
            $tab = [];
            $product_id = array_column($_SESSION['cart'], 'product_id');
            foreach ($product_id as $pi) {

                $product = $this->productModel->getProductById($pi);
                
                $i++;
                $tab[$i] = $product;
            }
            $total=0;
            foreach ($_SESSION['cart'] as $key => $value) {
                $total=$total+$value['total'];
            }
            $data = [
                'products' => $tab,
                'total'=>$total

            ];
            $this->view('checkout', $data);
        } else {
           // $this->view('shopCart');
            $this->view('checkout');
        }
    }
    public function addToFireBase()
    {
       var_dump($_POST);
         $data = [
            'id_product' => '',
            'qte' => '',
            'total' => '',
            'id_user' => '',
            'payment_mode' => '',
           
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                  $data = [
                    'id_product' => trim($_POST['product_id']),
                    'qte' => trim($_POST['qte']),
                    'total' => trim($_POST['total']),
                    'id_user' => trim($_POST['user_id']),
                    'payment_mode' =>  trim($_POST['payment_mode']),
                    
                ]; 
                $command = $this->checkoutModel->add($data);
                unset($_SESSION['cart']);
                header('location:' . URLROOT . '');
    }
}
}