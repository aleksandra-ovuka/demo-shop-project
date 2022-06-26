

<main class="container-fluid" >
<div class="card mb-3" style="max-width: 700px;margin:auto">
  <div class="row g-0">
  
    <div  class="col-md-7">
        <div class="img2">
      <img style="width:400px;height:450px;" src=" <?php  echo htmlspecialchars($product->img);?>" class="img-fluid rounded-start" >
    </div>  </div>
    <div class="col-md-5">
      <div class="card-body">
        <h5 class="card-title mb-5" style="font-size:x-large;color:#54BAB9;"><?php echo htmlspecialchars($product->title);?></h5>
       <p class="badge text-bg mb-5" style="font-size:larger;background-color:#54BAB9;font-size:x-large"><?php echo htmlspecialchars($product->price)."$";?></p>
        <div> <p class="card-text mb-3" style="font-size:larger ;"> <b> Brand: </b> <?php echo htmlspecialchars($product->title);?></span> </p> </div>
        <p class="card-text mb-5" style="font-size:larger ;"> <b> Category: </b> <?php echo htmlspecialchars($product->category);?></p>
        <form method="post">
                    <div class="input-group mb-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Quantity:</span>
                        </div>
                        <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="quantity" value="1">
                        <div class="input-group-append">
                           
                        </div>
                    </div>
                    <nav  aria-label="Page navigation example">
  <ul    class="pagination mt-3">
    <li   class="page-item"><a style="background-color:#54BAB9;color:antiquewhite" class="page-link" href="./single-product-page.php?page=<?php echo ($product->getPrevProductId());?>">Previous</a></li>
    <li class="page-item"><a  style="background-color:#54BAB9;color:antiquewhite"class="page-link" href="./products-page.php">Back</a></li>
    <li class="page-item"><a style="background-color:#54BAB9;color:antiquewhite" class="page-link" href="./single-product-page.php?page=<?php echo ($product->getPrevProductId());?>">Next</a></li>
  </ul>
</nav>
                    <input hidden name="product_id" value="<?php echo htmlspecialchars($product->id); ?>">
 <button type="submit" style="background-color:#A68DAD;color:#F2EBE9;font-size:x-large"class="btn btn-outline mt-5">Add to Cart <i class="fa fa-shopping-cart"> </i></button>
                    </form>
                    
                    <?php if(!empty($systemErrors['quantity'])) { ?>
                    <div class="error-msg text-danger">
                        <?php echo htmlspecialchars($systemErrors['quantity']) ?>
                    </div>
                    <?php } ?>
       
      </div>
   
 
    </div>
   
  
  </div>
</div>

<div class="container mb-5 mt-5" style="text-align:center;background-color:aliceblue"> 
<p class="card-text"><?php echo htmlspecialchars($product->description);?></p>
        
</div>




<div  color:blue class="container">
<h2  style="color:#A68DAD"; > Related products:</h2>
  <div class="row">

  <?php 

     foreach ($relatedProducts as $product) { ?>
      
    <div class="col-sm">
    <div  class="card mb-3" style="max-width: 500px;">
  <div class="row">
    <div class="col-md-8">
      <img  style="width:380px !important;height:360px;margin:auto !important;"src=" <?php echo htmlspecialchars($product->img);  ?>" class="img-fluid rounded-start w-100" alt="<?php echo htmlspecialchars($product->title);?>">
    </div>
    <div  style="background-color:#F2EBE9 ;"class="col-md-4">
      <div  class="card-body">
        <h5 style="color:#A68DAD" class="card-title"><?php echo htmlspecialchars($product->title);?></h5>
        <p class="badge text-bg" style="font-size:larger ;color:antiquewhite;background-color:#54BAB9"><?php echo htmlspecialchars($product->price)."$";?></p>
        <p class="card-text"> <b> Category: </b> <?php echo htmlspecialchars($product->category);?></p>
        <p class="card-text">  <b> Brand: </b><?php echo htmlspecialchars($product->brand);?></p>
       
      </div>
      <a style="color:antiquewhite;background-color: #A68DAD;" class="btn btn mt-5" href="./single-product-page.php?page=<?php echo htmlspecialchars($product->id); ?>">Show Product</a>
    </div>
  </div>
</div>
    </div>
    <?php } ?>
</div>
     </div>
     </div>
     </div>
</main>










