<!-- Header Section Begin -->
<header class="header" style="background:#f0f3fa;">

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">

                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">


                    <ul>
                        <li> <a href="<?php echo URLROOT ?>"> Home </a></li>
                        <li><a href="<?php echo URLROOT ?>/Pages/shop">Shop</a></li>
                        <li><a href="#">Pages</a>

                            <ul class="dropdown">
                                <li><a href="<?php echo URLROOT ?>/pages/about">About Us</a></li>

                                <li><a href="<?php echo URLROOT ?>/carts/getOrders">Shopping Cart</a></li>
                             

                            </ul>
                        </li>

                        <li><a href="<?php echo URLROOT ?>/pages/contact">Contacts</a></li>
                        
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    Cart
                    <a href="<?php echo URLROOT ?>/carts/getOrders"><img src="<?php echo URLROOT ?>/public/img/icon/cart.png" alt="">


                    
                        <?php

                        if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" >$count</span>";
                        } else {
                            echo "<span id=\"cart_count\" >0</span>";
                        }

                        ?>
                        
                            <?php if (isset($_SESSION['user_id'])) : ?>
                                <a class="primary-btn" href="<?php echo URLROOT; ?>/users/logout">Log out</a>
                            <?php else : ?>
                                <a class="primary-btn" href="<?php echo URLROOT; ?>/users/login">Login</a>
                            <?php endif; ?>
                        
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>

</header>
<!-- Header Section End -->