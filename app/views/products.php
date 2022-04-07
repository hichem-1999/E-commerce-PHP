<!DOCTYPE html>
<html lang="zxx">


<?php require("inc/head.php") ?>
<!--<script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>-->

<body>
    <?php require("inc/header.php") ?>
    <?php require("inc/nav.php") ?>
    <?php var_dump($_SESSION); ?>

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

                                                    <form method="GET">
                                                        <select name="categorie" onChange="searchPropositions(this.value)">
                                                            <option value="d">Choisir categorie</option>
                                                            <?php foreach ($data["categorie"] as $c) { ?>
                                                                <option value="<?php echo $c->id ?>"><?php echo $c->name ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </form>

                                                    <?php foreach ($data["categorie"] as $c) { ?>
                                                        <li><input  type="checkbox" id="cat" class="filtre" value="<?php echo ($c->id) ?>">
                                                            <?php echo ($c->name) ?></li>
                                                    <?php } ?>


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
                    <div class="row" id="reslt">

               			 <!--products-->

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