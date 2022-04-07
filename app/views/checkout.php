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
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            <div class="checkout__form">
                <form id="checkout-form" method="POST" action="<?php echo URLROOT; ?>/Checkout/addToFireBase">
                    <div class="row">
                        <div class="col-2">
                            <?php if (isset($_SESSION['cart'])) { ?>
                        </div>
                        <div class="col-8">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product * QTE <span>Total</span><span>Total</span>
                            </div>
                                <ul class="checkout__total__products">
                                    <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                                        <li> <?php echo $value['name'] . " *" ?><?php echo $value['qte'] ?> <span>$ <?php echo $value['total']; ?></span></li>
                                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                                        <input type="hidden" name="qte" value="<?php echo $value['qte']; ?>">
                                    <?php } ?>
                                </ul>
                                <ul class="checkout__total__all">
                                    <?php if (isset($_SESSION['cart'])) { ?>
                                        <li>Total <span>$ <?php echo $data['total'] ?></span></li>
                                        <input type="hidden" name="total" value="<?php echo $data['total']; ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                    <?php } else { ?>
                                        <li>Total <span>$ 0</span></li>
                                    <?php } ?>

                                </ul>

                                <p> Please, Chose your payment methode.</p>
                                <div>
                                    <div class=" form-check">
                                        <div class="row">
                                            <div class="col">
                                                
                                                <label for="paypal">
                                                    MasterCard
                                                    <input type="checkbox" id="Bitcoin" name="payment_mode" value=" MasterCard">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col">
                                            <label for="payment">
                                                    Check Payment
                                                    <input  type="checkbox" id="payment" name="payment_mode" value="Check Payment">
                                                    <span class="checkmark"></span>
                                                </label>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" form-check">
                                        <div class="row">
                                            <div class="col">
                                                <label for="paypal">
                                                    Bitcoin
                                                    <input  type="checkbox" id="Bitcoin" name="payment_mode" value=" Bitcoin">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col">
                                            <label for="paypal">
                                                    Paypal
                                                    <input type="checkbox" id="paypal" name="payment_mode" value=" Paypal">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                    <img src="<?php echo URLROOT ?>/public/img/payment.png" alt="">
                                    </div>
                                </div>

                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            <?php } else { ?>
                                <div class="breadcrumb__text">
                                    <h4>the cart is empty</h4>

                                </div>
                            <?php } ?>
                            </div>


                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <?php require("inc/footer.php") ?>
</body>

</html>