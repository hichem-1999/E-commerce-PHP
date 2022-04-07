<!DOCTYPE html>
<html lang="zxx">

<?php require("inc/head.php") ?>

<body>
   

    <?php require("inc/header.php") ?>
    <?php require("inc/nav.php") ?>
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Product Details</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section Begin -->
    <section class="shop-details">
    <div class="product__details__pic">
            <div class="container">
                
                <div class="row">
                    
                    <div class="col">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img width="400" height="400" src="<?php echo URLROOT.($data["image"]); ?>" alt="">
                                </div>
                                <div class="product__details__text">
                                <h4><?php echo($data["name"]); ?></h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span> - 5 Reviews</span>
                            </div>
                            <h3><?php echo($data["price"]); ?><span>70.00</span></h3>
                            <p><?php echo($data["name"]); ?> with quilted lining and an adjustable hood. Featuring long sleeves with adjustable
                                cuff tabs, adjustable asymmetric hem with elastic side tabs and a front zip fastening
                                with placket.</p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product__details__text">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="product__details__option">
                                <div class="product__details__option__size">
                                    <span>Size:</span>
                                    <label  class="active"  for="xxl"><?php echo($data["size"]); ?>
                                        <input type="radio" id="xxl">
                                    </label>
                                    
                                </div>
                                <div class="product__details__option__color">
                                    <span>Color:</span> 
                                    <label class="c-1" for="sp-1"><?php echo($data["color"]); ?>
                                        <input type="radio" id="sp-1">
                                    </label>
                                    <label class="c-2" for="sp-2">
                                        <input type="radio" id="sp-2">
                                    </label>
                                    <label class="c-3" for="sp-3">
                                        <input type="radio" id="sp-3">
                                    </label>
                                    <label class="c-4" for="sp-4">
                                        <input type="radio" id="sp-4">
                                    </label>
                                    <label class="c-9" for="sp-9">
                                        <input type="radio" id="sp-9">
                                    </label>
                                </div>
                            </div>
                            <div class="product__details__cart__option">
                              
                                <a href="#" class="primary-btn">add to cart</a>
                            </div>
                           
                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="<?php echo (URLROOT); ?>public/img/shop-details/details-payment.png" alt="">
                                <ul>
                                <li><span>brand:</span><?php foreach ($data1 as $d)
                                
                                    if ($d->id == ($data["brand"]))
                                    echo $d->name ;
                                    ?></li>
                                    <li><span>Categories:</span><?php foreach ($data2 as $d)
                                    if ($d->id == ($data["categorie"]))
                                    echo $d->name ;
                                    ?></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                
        
        
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    

    <?php require("inc/footer.php") ?>
</body>

</html>