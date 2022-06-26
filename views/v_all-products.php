<main class="mt-5">

    <div class="container">
        <form class="row" action="./products-page.php" method="get">
            <div class="col-2">
                <select name="sort" class="form-select">
                    <option <?php
                            if ($sort == "") {
                                echo htmlspecialchars("Selected");
                            } ?> value="">Sort By Price</option>
                    <option <?php  if ($sort == 'price-asc') {
                            } ?> value="<?php echo htmlspecialchars(\Models\Product\Product::ORDER_BY_PRICE_ASC); ?>">By price asc</option>
                    <option <?php if ($sort == 'price-desc') {
                                echo htmlspecialchars("Selected");
                            } ?> value="<?php echo htmlspecialchars(\Models\Product\Product::ORDER_BY_PRICE_DESC); ?>">By price desc</option>
                     
                </select>
            </div>
            <div class="col-2">
                <select name="category" class="form-select">
                    <option <?php
                            if ($category == "") {
                                echo htmlspecialchars("Selected");
                            } ?> value="">Sort By Category</option>
                    <option value="Glass"> Glass</option>
                    <option value="Ceramic"> Ceramic</option>
                    <option value="Abstract">Abstract</option>
                    <option value="Modern"> Modern</option>
                    <option value="Wood"> Wood</option>
                    
                     
                </select>
            </div>
            <div class="col-3"></div>
            <input class="col-3" type="text" name="term" value="<?php echo htmlspecialchars($term); ?>">
            <button type="submit" style="background-color:#54BAB9;color:antiquewhite" class="btn btn col-1">Search <i class="fa fa-search"></i> </button>
            <hr class="mt-3">
        </form>

        <div  class="container overflow-hidden">

<h5 style="color:#54BAB9; font-size:x-large"> Artistic Vases: </h5> 

<div class="row mb-5 gx-5">
        <?php foreach ($products as $product) { ?>
            <div style="background-color:FBF8F1;" class="card p-3 border col-3 ">
                <div class="m-3 mr-5">
                <h5 style="color:#A68DAD ;text-align:center; font-size:x-large" class="card-title"><?php echo htmlspecialchars($product->title); ?></h5>
                 <div class="img"> <a href="./single-product-page.php?page=<?php echo htmlspecialchars($product->id); ?>">  <img  src="<?php echo htmlspecialchars($product->img); ?>" class="card-img-top " alt="<?php echo htmlspecialchars($product->title); ?>"> </a> </div>
                    <div class="card-body ml-5 gx-5">
                        
                        <p class="badge text" style="font-size:larger ;background-color:#54BAB9"><?php echo htmlspecialchars($product->price)."$";?></p>
                        <p style:back class="card-text"><?php  echo htmlspecialchars($product->description); ?></p>
                        <p  class="card-text"><b><span style="color:#54BAB9"> Category: </span> </b><?php echo htmlspecialchars($product->category); ?></p>
                        <p  class="card-text"><b><span style="color:#54BAB9"> Brand: </span></b><?php echo htmlspecialchars($product->brand); ?></p>
                        <div class="d-flex">
                        <a href="./single-product-page.php?page=<?php echo htmlspecialchars($product->id); ?>" style="background-color:#54BAB9;color:antiquewhite" class="btn btn"> Show Product</a>
                        <button   form="add-cart-<?php echo htmlspecialchars($product->id);?>" style="background-color:#A68DAD;color:antiquewhite;margin-left:1em;" class="btn btn"> Add to Cart<i class="fa fa-shopping-cart"></i> </button>
                        <form  id="add-cart-<?php echo htmlspecialchars($product->id);?>" type="hidden" method="POST" action="./products-page.php">
                            <input type="hidden" name="product_id" value=<?php echo htmlspecialchars($product->id); ?>> </form>
                      </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
        </div>
       
    </div>
</main>
</main>