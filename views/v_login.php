<main>

<div class="container">
<form action="./login.php" method="POST" >
<div class="col-6 mt-3 ">
    <label> Email: </label>
    <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Email" value="<?php  if(!empty($email)) echo htmlspecialchars($email); ?>">
    <?php if (!empty($systemErrors['email'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['email']); ?></small> 
                        <?php } ?>
</div>
  <div class="col-6 mt-3 ">
  <label> Password:</label>
  <input type="text" class="form-control" name="password" placeholder="Password" aria-label="Password" value=" <?php if(!empty($password)) echo htmlspecialchars($password); ?>">
  <?php if (!empty($systemErrors['password'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['password']); ?></small> 
                        <?php } ?>
</div class="container">
<div>
<button type="submit" name="login" class="btn btn-success mt-3 mb-5"> Login </button>


  </div>
  </form>
<div>
<h4>Don't have an account? Register <a href="./register.php"> Here! </a> </h4>


</div>



</div>










</main>