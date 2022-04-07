<!DOCTYPE html>
<html lang="zxx">


<?php require("inc/head.php") ?>
<!--<script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>-->

<body>
    <?php require("inc/header.php") ?>
    <?php require("inc/nav.php") ?>
  

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">

                <div class="row " id="filter_data">

                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <?php foreach ($data["categorie"] as $c) {
                                                    ?>
                                                        <div class="list-group-item checkbox">
                                                            <label><input type="checkbox" class="common_selector brand" value="<?php echo $c->id ?>"> <?php echo $c->name ?></label>
                                                        </div>
                                                    <?php
                                                    }

                                                    ?>


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    <?php foreach ($data["brands"] as $brand) {
                                                    ?>
                                                        <div class="list-group-item checkbox">
                                                            <label><input type="checkbox" class="common_selector brand" value="<?php echo $brand->id ?>"> <?php echo $brand->name ?></label>
                                                        </div>
                                                    <?php
                                                    }

                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="#">$0.00 - $50.00</a></li>
                                                    <li><a href="#">$50.00 - $100.00</a></li>
                                                    <li><a href="#">$100.00 - $150.00</a></li>
                                                    <li><a href="#">$150.00 - $200.00</a></li>
                                                    <li><a href="#">$200.00 - $250.00</a></li>
                                                    <li><a href="#">250.00+</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <a href="<?php echo URLROOT ?>/products/sortByPrice">Sort by Price:</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       

                            <?php foreach ($data["products"] as $p) { ?>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="<?php echo URLROOT . ($p->img); ?>">

                                            <ul class="product__hover">
                                                <li><a href="#"><img src="<?php echo URLROOT ?>/public/img/icon/heart.png" alt=""></a></li>
                                                <li><a href="#"><img src="<?php echo URLROOT ?>/public/img/icon/compare.png" alt=""> <span>Compare</span></a>
                                                </li>
                                                <li><a href="<?php echo URLROOT ?>products/details?id=<?php echo ($p->id) ?>"><img src="<?php echo URLROOT ?>/public/img/icon/search.png" alt=""></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><?php echo $p->name ?></h6>
                                            <a href="<?php echo (URLROOT) ?>orders/addOrder?id=<?php echo ($p->id); ?>&price=<?php echo ($p->price); ?>&name=<?php echo ($p->name); ?>&img=<?php echo ($p->img); ?>" class="add-cart">+ Add To Cart</a>
                                            <div class="rating">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <h5><?php echo $p->price ?></h5>
                                            <div class="product__color__select">
                                                <label for="pc-4">
                                                    <input type="radio" id="pc-4">
                                                </label>
                                                <label class="active black" for="pc-5">
                                                    <input type="radio" id="pc-5">
                                                </label>
                                                <label class="grey" for="pc-6">
                                                    <input type="radio" id="pc-6">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <?php require("inc/footer.php") ?>
    <style>
        #loading {
            text-align: center;
            background: url('loader.gif') no-repeat center;
            height: 150px;
        }
    </style>

    <script>
        $(document).ready(function() {
            filtredata();

            function filtredata() {
                var action = "data";
                var brand = getfiltre("brand");
                var cat = getfiltre("cat");
                var slider = document.getElementById('price-slider');
                var recherche = <?php echo json_encode($recherche); ?>
                var minPrice = 0;
                var maxPrice = 5;
                slider.noUiSlider.on('update', function(values) {
                    minPrice = values[0];
                    maxPrice = values[1];
                    minPrice = minPrice.substring(0, minPrice.length - 1);
                    maxPrice = maxPrice.substring(0, maxPrice.length - 1);
                })

                console.log(brand);
                $.ajax({
                    url: "<?php echo URLROOT ?>/filtreProd/ajax",
                    method: "POST",
                    data: {
                        brand: brand,
                        cat: cat,
                        min: minPrice,
                        max: maxPrice,
                        recherche: recherche,
                        action: action
                    },
                    success: function(data) {
                        console.log(data);
                        $("#reslt").html(data);

                    }


                });



            }

            function getfiltre(id) {
                var filtre = [];
                $('#' + id + ':checked').each(function() {
                    filtre.push($(this).val());
                });
                return filtre;



            }
            $(".filtre").click(function() {
                filtredata();

            });
        })
    </script>
</body>

</html>