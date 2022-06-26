<main>

<div class="container">
<?php foreach($mrows as $mkey) { ?>
<table class="table col-6 mb-5">
  <thead>
    <tr>
      <th style="color:#A68DAD" scope="col">Messages:</th>

    </tr>
  </thead>
  <tbody col-6>
  <tr>
      <th  style="color:#54BAB9" scope="row">Id:</th>
      <td> <b> <?php echo $mkey['id'] ;?> </b> </td>
    </tr>
    <tr>
    <tr>
      <th  style="color:#54BAB9" scope="row">Name:</th>
      <td> <b> <?php echo $mkey['name'] ;?> </b> </td>
    </tr>
    <tr>
      <th style="color:#54BAB9" scope="row">Last Name:</th>
      <td> <b> <?php echo $mkey['last_name'];?> </b> </td>
    
    </tr>
    <tr>
      <th  style="color:#54BAB9" scope="row">Email: </th>
      <td colspan="2"> <b> <?php echo $mkey['email'];?> </b> </td>
    </tr>
    <tr>
      <th  style="color:#54BAB9" scope="row">Message: </th>
      <td   colspan="2"> <b><?php echo $mkey['message'];?> </b> </td>
    </tr>
  </tbody>
</table>
<?php } ?>
<form action="profile.php" method="post">
    <button style="background-color:#A68DAD ;" class="btn btn mb-5" type="submit" name="logout"> Log out </button>
</form>
  <a style="background-color:#54BAB9  ;" class="btn btn mb-5 " href="./profile.php"> Back to Profile </a>
</div>