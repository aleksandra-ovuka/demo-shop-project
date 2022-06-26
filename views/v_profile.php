<main>

<div class="container">
<?php foreach($rows as $key) { ?>
<table class="table col-6 mb-5">
  <thead>
    <tr>
      <th style="color:#A68DAD" scope="col">Your Profile:</th>

    </tr>
  </thead>
  <tbody col-6>
    <tr>
      <th  style="color:#54BAB9" scope="row">Name:</th>
      <td> <b> <?php echo $key['name'] ;?> </b> </td>
    </tr>
    <tr>
      <th style="color:#54BAB9" scope="row">Last Name:</th>
      <td> <b> <?php echo $key['last_name'];?> </b> </td>
    
    </tr>
    <tr>
      <th  style="color:#54BAB9" scope="row">Email: </th>
      <td colspan="2"> <b> <?php echo $key['email'];?> </b> </td>
    </tr>
    <tr>
      <th  style="color:#54BAB9" scope="row">Age: </th>
      <td   colspan="2"> <b><?php echo $key['age'];?> </b> </td>
    </tr>
    <tr>
      <th  style="color:#54BAB9" scope="row">Gender: </th>
      <td  colspan="2">  <b><?php echo $key['gender'];?> </b> </td>
    </tr>
    <tr>
      <th style="color:#54BAB9" scope="row">Password: </th>
      <td   colspan="2"> <b> Hidden </b> </td>
    </tr>

  </tbody>
</table>
<?php } ?>
<form action="profile.php" method="post">
    <button style="background-color:#A68DAD ;color:antiquewhite" class="btn btn mb-5" type="submit" name="logout"> Log out </button>
</form>
  <a style="background-color:#54BAB9  ;color:antiquewhite" class="btn btn mb-5" href="./editprofile.php"> Edit Profile </a>
  <a style="background-color:#54BAB9  ;color:antiquewhite" class="btn btn mb-5 mx-5" href="./messages.php"> Your Messages</a>
  <a style="background-color:#54BAB9  ;color:aliceblue" class="btn btn mb-5 mx-5" href="./create_product.php"> Create Product</a>
</div>







</main>