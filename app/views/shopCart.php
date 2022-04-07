<!DOCTYPE html>
<html lang="zxx">
<?php require("inc/head.php") ?>

<body>
    <?php require("inc/header.php") ?>
    <?php require("inc/nav.php") ?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php if (isset($_SESSION['cart'])) { ?>
                        <div class="shopping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>


                                <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                                        <tr>
                                            <td class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <img width="150" height="150" src="<?php echo URLROOT . $value['img'] ?>" alt="">

                                                </div>

                                                <div class="product__cart__item__text">
                                                    <h6><?php echo $value['name'] ?></h6>
                                                    <h5><?php echo  "$ " . $value['price']?></h5>
                                                </div>
                                            </td>
                                            <form method="Get" action="<?php echo URLROOT; ?>/Carts/setQte">
                                                <td class="quantity__item">
                                                    <div class="quantity">



                                                       
                                                            <input type='submit' name=<?php echo $key . "2" ?> value='-'>
                                                            <?php echo $value['qte'] ?>
                                                            <input type='submit' name=<?php echo $key . "1" ?> value='+'>
                                                    </div>
                                                </td>
                                                <td class="cart__price">
                                                    <?php echo $value['total'] ?>
                                                </td>
                                          
                                            </form>




                                            <td class="cart__close"><a href="<?php echo (URLROOT) ?>Carts/deleteOrder?id=<?php echo  $value['product_id'] ?>" class="add-cart"><i class="fa fa-close"></i></td>



                                        </tr>

                                    <?php } ?>


                                </tbody>
                            </table>

                        </div>
                    <?php } else { ?>
                        <div class="breadcrumb__text">
                            <h4>the cart is empty</h4>

                        </div>
                    <?php } ?>





                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">

                                <a href="<?php echo URLROOT ?>/Pages/shop">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <?php if (isset($_SESSION['cart'])) { ?>
                                <li>Total <span>$ <?php echo $data['total'] ?></span></li>
                            <?php } else { ?>
                                <li>Total <span>$ 0</span></li>
                            <?php } ?>
                        </ul>

                        <a class="primary-btn" href="<?php echo URLROOT ?>/Checkout/getOrders">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->



    <?php require("inc/footer.php") ?>
</body>

</html>