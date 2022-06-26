<main class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-6 mb-5">
                <form class="p-4" action="./checkout-page.php" method="POST" style="border: solid black 2px; border-radius: 2%;">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php  if(!empty($name)) echo htmlspecialchars($name); ?>">
                        <?php if (!empty($systemErrors['name'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['name']); ?></small> 
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" class="form-control" id="last-name" placeholder="Enter last name" name="last_name" value="<?php  if(!empty($last_name))   echo htmlspecialchars($last_name); ?>">
                        <?php if (!empty ($systemErrors['last_name'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['last_name']); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php  if (!empty($email)) echo htmlspecialchars($email); ?>">
                        <?php if (!empty($systemErrors['email'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['email']); ?></small>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" value="<?php if (!empty($city)) echo htmlspecialchars($city); ?>">
                                <?php if (!empty($systemErrors['city'])) { ?>
                                    <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['city']); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" value="<?php  if (!empty($phone)) echo htmlspecialchars($phone); ?>">
                                <?php if (!empty($systemErrors['phone'])) { ?>
                                    <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['phone']); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="street">Street & number</label>
                                <input type="text" class="form-control" id="street" placeholder="Enter street & number" name="street" value="<?php  if (!empty($street)) echo htmlspecialchars($street); ?>">
                                <?php if (!empty($systemErrors['street'])) { ?>
                                    <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['street']); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" placeholder="Enter zip" name="zip" value="<?php  if (!empty($zip)) echo htmlspecialchars($zip); ?>">
                                <?php if (!empty($systemErrors['zip'])) { ?>
                                    <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['zip']); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" placeholder="Comment" name="message"><?php  if(!empty ($message)) echo htmlspecialchars($message); ?></textarea>
                        <?php if (!empty($systemErrors['message'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['message']); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-check mb-5">
                        <input type="checkbox" name="rights" value="success" class="form-check-input" id="rights" <?php if ( !empty($rights) && $rights == 'success') {
                                                                                                                        echo htmlspecialchars("Checked");
                                                                                                                    } ?>>
                        <label class="form-check-label" for="rights">Have you read and do you agree to our Terms and Customer rights policy?</label>
                        <?php if (!empty($systemErrors['rights'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['rights']); ?></small>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-success mt-5 mb-5" name="buy" value="yes">Buy</button>
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                    <input type="hidden" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>">
                </form>
            </div>

            <div class="col-6">
    <h1> Your order: </h1>
<form action="shopping-cart.php" method="POST">
<table  class="table mt-5">
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
      <button  type="submit" class="btn btn mb-5" style="background-color:#54BAB9 ;" > Go Back to Cart <i class="fa fa-cart" aria-hidden="true"></i></button>
      <span> <strong> TOTAL : </strong><?php echo htmlspecialchars($total); ?></span> </div>
     
</form>






</div>


</main>
