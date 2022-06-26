<main class="mt-5">
    <div class="container">
        <h1 class="text-light bg-success text-center m-5 p-5">You have succesfully created a product!</h1>
        <div class="text-center m-5">
        <span>  Go back to your </span> <a class="btn btn-outline-info" href="./profile.php">profile</a>
        </div>
    </div>


    <div style="background-color:FBF8F1;margin:auto" class="card p-3 border col-3 mb-5 ">
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

</div>


</main>

