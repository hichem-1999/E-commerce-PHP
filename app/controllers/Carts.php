<?php
class Carts extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('MProducts');
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
            $this->view('shopCart', $data);
            
        } else {
            $this->view('shopCart');
           
        }
    }

  public function setQte(){
    $tab_prod = $_SESSION['cart'];
	foreach($tab_prod as $key=>$value){
		$p1=$key.'1';
		$p2=$key.'2';
		if(isset($_GET[$p1])){
			$value['qte']++;
			$value['total']+=$value['price'];
            $tab_prod[$key]=$value;
            $_SESSION['cart']=$tab_prod;
			//echo $_SESSION['panier'][$key];
           
            header('location:' . URLROOT . '/carts/getOrders');
			break;
		}
		if(isset($_GET[$p2])){
			if($value['qte']>0){
				$value['qte']--;
                $value['total']-=$value['price'];
				$tab_prod[$key]=$value;
				$_SESSION['cart']=$tab_prod;
			
               
                header('location:' . URLROOT . '/carts/getOrders');
				break;
			}
		}
	}
    

  }

    public function deleteOrder()
    {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["product_id"] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);


            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Product has been Removed...!');
            window.location.href='" . URLROOT . " Carts/getOrders';
            </script>");
            }
        }
    }
}
