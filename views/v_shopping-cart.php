<main>
<div class="container"> 
<form action="shopping-cart.php" method="POST">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
    </tr>
  </thead>
  <tbody>
      <?php $total=0;
       foreach ($cartItems as  $items) { 
       
          $subtotal = $items->getSubtotal();
          $total += $subtotal;
          ?>
     
    <tr>
      <th><input type="checkbox" name="remove[]" value="<?php echo htmlspecialchars($items->getProduct()->id);?>">  </th>
      <td> <?php  echo htmlspecialchars($items->getProduct()->title)?> </td>
      <td><?php  echo htmlspecialchars($items->getProduct()->price)."$"?></td>
      <td > <img style="width:100px" src=" <?php echo htmlspecialchars($items->getProduct()->img) ?>">  </td>
 
      <td><?php echo htmlspecialchars($items->getQuantity()); ?></td>
     <td><?php echo htmlspecialchars($subtotal); ?></td>

    </tr>
   <?php } ?>
  </tbody>
 
</table>
<div  class="d-flex justify-content-between"> 
      <button  type="submit" class="btn btn mb-5" style="background-color:#54BAB9 ;" > Remove <i class="fa fa-trash" aria-hidden="true"></i></button>
      <div  style="margin-left:40%" class="d-flex justify-content-between pl-3" >
      <button name="down" type="" value="<?php echo htmlspecialchars($items->getProduct()->id);?>" class="btn btn mb-5 mx-3" style="background-color:#54BAB9 ;" > <i class="fa fa-arrow-down" aria-hidden="true"></i></button> <h5> Quantity </h5>
      <button name="up" type="" value="<?php echo htmlspecialchars($items->getProduct()->id);?>" class="btn btn mb-5 mx-3" style="background-color:#54BAB9 ;" > <i class="fa fa-arrow-up" aria-hidden="true"></i></button>
       </div>
      <span> <strong> TOTAL : </strong><?php echo htmlspecialchars($total); ?></span> </div>
      <div class="d-flex justify-content-between">
        <button style="background-color:#A68DAD"type="submit" name="all" class="btn btn mb-3"> Remove All <i class="fa fa-trash" aria-hidden="true"></i></button>
      <a  style="margin-left:80%" href="./checkout-page.php" class="btn btn-success m-2">Checkout</a>
       </div>
</form>





</div>


</main>