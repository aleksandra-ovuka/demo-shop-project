


<main >
<div>
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="./public/theme/image/pottery.jpg" class="d-block w-100" alt="...">
      <div style="background-color:#54BAB9 ;" class="carousel-caption d-none d-md-block">
        <h1>Special offer:</h1>
        <h4>Visit our website on 16th july for all kinds of special discounts!</h4>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="./public/theme/image/gift.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Birthday Gift Card</h1>
        <h4>A perfect birthday gift </h4>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="./public/theme/image/blackfirday.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Black Friday</h1>
        <h4>Get up to 20% off </h4>
      </div>
    </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        </div>
<div  class="container overflow-hidden ">
<h5 style="color:#A68DAD; font-size:x-large"> Popular products: </h5> 
<div class="row mb-5 gx-5">
        <?php foreach ($mostProducts as $product) { ?>
            <div  class="card p-3 border col-3 ">
                <div class="m-3 mr-5">
                <h5 style="color:#A68DAD ;text-align:center; font-size:x-large" class="card-title"><?php echo htmlspecialchars($product->title); ?></h5>
                 <div class="img"> <a href="./single-product-page.php?page=<?php echo htmlspecialchars($product->id); ?>">  <img  src="<?php echo htmlspecialchars($product->img); ?>" class="card-img-top " alt="<?php echo htmlspecialchars($product->title); ?>"> </a> </div>
                    <div class="card-body ml-5 gx-5">
                        
                        <p class="badge text" style="font-size:larger ;background-color:#54BAB9"><?php echo htmlspecialchars($product->price)."$";?></p>
                        <p  class="card-text" style="color:#2e6665"><b> <?php  echo htmlspecialchars($product->description); ?> </b></p>
                        <p  class="card-text"  style="color:#2e6665"><b><span style="color:#54BAB9"> Category: </span> <?php echo htmlspecialchars($product->category); ?> </b></p>
                        <p  class="card-text"  style="color:#363062"><b><span style="color:#54BAB9"> Brand: </span></b><?php echo htmlspecialchars($product->brand); ?></p>
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
<div>
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="./public/theme/image/whitevases.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Special offer:</h1>
        <h4>Visit our website on 16th july for all kinds of special discounts!</h4>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="./public/theme/image/gift.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Birthday Gift Card</h1>
        <h4>A perfect birthday gift </h4>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="./public/theme/image/blackfirday.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Black Friday</h1>
        <h4>Get up to 20% off </h4>
      </div>
    </div>
 
</div>
        </div>

        <div  class="container overflow-hidden">
<h5 style="color:#54BAB9; font-size:x-large;"> Bargain products: </h5> 
<div class="row mb-5 gx-5">
        <?php foreach ($someProducts as $product) { ?>
            <div  class="card p-3 border col-3 ">
                <div class="m-3 mr-5">
                <h5 style="color:#A68DAD ;text-align:center; font-size:x-large" class="card-title"><?php echo htmlspecialchars($product->title); ?></h5>
                 <div class="img"> <a href="./single-product-page.php?page=<?php echo htmlspecialchars($product->id); ?>">  <img  src="<?php echo htmlspecialchars($product->img); ?>" class="card-img-top " alt="<?php echo htmlspecialchars($product->title); ?>"> </a> </div>
                    <div class="card-body ml-5 gx-5">
                        
                        <p class="badge text" style="font-size:larger ;background-color:#54BAB9"><?php echo htmlspecialchars($product->price)."$";?></p>
                        <p  class="card-text" style="color:#2e6665"><b> <?php  echo htmlspecialchars($product->description); ?> </b></p>
                        <p  class="card-text"  style="color:#2e6665"><b><span style="color:#54BAB9"> Category: </span> <?php echo htmlspecialchars($product->category); ?> </b></p>
                        <p  class="card-text"  style="color:#363062"><b><span style="color:#54BAB9"> Brand: </span></b><?php echo htmlspecialchars($product->brand); ?></p>
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

</main>