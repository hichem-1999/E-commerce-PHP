<?php
class orders extends Controller
{
    public function __construct()
    {
    }


    public function addOrder()
    {
        //      $product=$this->productModel->getProductById($_GET["id"]);

        //$_SESSION['product'] = $product;
        //$_SESSION['product']['price'] = $product->price;
        //$_SESSION['product']['size'] = $product->size;
        //$_SESSION['product']['color'] = $product->color;
        //$_SESSION['product']['brand'] = $product->id_brand;
        //$_SESSION['product']['categorie'] = $product->id_cat;
        //$_SESSION['product']['image'] = $product->img;
        //$_SESSION['product']['qte'] = $product->qte;
        //header('location:' . URLROOT . '/shopDetails');
        //} else {
        //  echo("fuck");
        //}
        if (isset($_SESSION['user_id'])) {
            if (isset($_SESSION['cart'])) {

                $item_array_id = array_column($_SESSION['cart'], "product_id");

                if (in_array($_GET["id"], $item_array_id)) {


                    echo ("<script LANGUAGE='JavaScript'>
            window.alert('Product is already added in the cart..!');
            window.location.href='" . URLROOT . " pages/shop';
            </script>");
                } else {

                    $count = count($_SESSION['cart']);
                    $item_array = array(
                        'product_id' => $_GET["id"],
                        'qte' => '1',
                        'price' => $_GET["price"],
                        'total' => $_GET["price"],
                        'name' => $_GET["name"],
                        'img' => $_GET["img"],
                    );

                    $_SESSION['cart'][$count] = $item_array;
                    header('location:' . URLROOT . '/pages/shop');
                }
            } else {

                $item_array = array(
                    'product_id' => $_GET["id"],
                    'qte' => '1',
                    'price' => $_GET["price"],
                    'total' => $_GET["price"],
                    'name' => $_GET["name"],
                    'img' => $_GET["img"],
                );

                // Create new session variable
                $_SESSION['cart'][0] = $item_array;
              header('location:' . URLROOT . '/pages/shop');
            }
        } else {


            echo ("<script LANGUAGE='JavaScript'>
            window.alert('you have to login first ..!');
            window.location.href='" . URLROOT . " users/login';
            </script>");
        }
    }
}
