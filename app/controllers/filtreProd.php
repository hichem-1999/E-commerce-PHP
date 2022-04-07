<?php
class filtreProd extends Controller {
    public function __construct() {
        
            $this->userModel = $this->model('MProducts');
        
    }

    public function ajax(){
        if(isset($_POST['brand'])){
            $val=$_POST['brand'];
  }else{
      $val=null;
  }
  if(isset($_POST['cat'])){
    $cat=$_POST['cat'];
}else{
$cat=null;
}
$min=$_POST['min'];
$max=$_POST['max'];
if(isset($_POST['recherche'])){
    $recherche=$_POST['recherche'];
}
else{
    $recherche="";
}

        
      
        $action=$_POST['action'];
        $output="";
        $cats=$this->userModel->getCategories();
        $brands=$this->userModel->getBrands();
        



        
        if(!empty($this->userModel->getprod($action,$val,$cat,$min,$max,$recherche))){

        if(isset($action)){
            
            
            foreach($this->userModel->getprod($action,$val,$cat,$min,$max,$recherche) as $prod){
                $img=$prod->img ;
                    $imgs=explode(',',$img);
                    foreach($brands as $br){
                        if($prod->id_brand==$br->id){
                            $id_brand=$br->name;
                        }
                    }
                    
                        

                    
                    
                $output.='<div class="col-md-4 col-sm-6 col-xs-6">
                <div class="product product-single">
                    <div class="product-thumb">
                        <div class="product-label">
                            <span>New</span>
                            <span class="sale">-20%</span>
                        </div>
                        <button class="main-btn quick-view"><i class="fa fa-search-plus"></i><a href="'.URLROOT.'/products/details?id='.$prod->item_id.'"> Quick view</a></button>
                        <img src="'.$imgs[0].'" alt="">
                    </div>
                    <div class="product-body">
                        <h3 class="product-price">$'.$prod->item_price.' <del class="product-old-price">$'.($prod->item_price/100)*(100-$prod->item_discount).'</del></h3>
                        
                        
                        <div class="product-rating">'.$strrating.'
                            
                        </div>
                        <h2 class="product-name"><a href="#">'.$item_brand.'</a></h2>
                        <div class="product-btns">
                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="'.URLROOT.''.$prod->img.'">
                                            <ul class="product__hover">
                                                <li><a href="#"><img src="'.URLROOT.'/public/img/icon/heart.png" alt=""></a></li>
                                                <li><a href="#"><img src="'.URLROOT.'/public/img/icon/compare.png" alt=""> <span>Compare</span></a>
                                                </li>
                                                <li><a href="'.URLROOT.'products/details?id=<?php echo ($p->id) ?>"><img src="'.URLROOT.'/public/img/icon/search.png" alt=""></a></li>
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
                                </div>';

            }

        }
        else{
            echo("not found");
        }
    }
    else{
        echo("not found");
    }
    echo($output);

      

    }



}