<main>
    
 <div  class="container">
 <h1> Create your Profile!</h1>
  <div  class="col">
  <form action="./register.php" method="POST" >

<div class="row">

  <div  class="col-3">
   First Name:
    <input type="text" class="form-control" name="name" placeholder="First name" aria-label="First name" value="<?php  if(!empty($name)) echo htmlspecialchars($name); ?>">
    <?php if (!empty($systemErrors['name'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['name']); ?></small> 
                        <?php } ?>
  </div>
  <div class="col-3">
    Last Name:
   <input type="text" class="form-control" name="last_name" placeholder="Last name" aria-label="Last name" value="<?php  if(!empty($last_name)) echo htmlspecialchars($last_name); ?>">
   <?php if (!empty($systemErrors['last_name'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['last_name']); ?></small> 
                        <?php } ?>
</div>
</div>
  <div class="col-6 mt-3 ">
    <label> Email: </label>
    <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Email" value="<?php  if(!empty($email)) echo htmlspecialchars($email); ?>">
    <?php if (!empty($systemErrors['email'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['email']); ?></small> 
                        <?php } ?>
</div>
  <div class="col-6 mt-3 ">
  <label> Password:</label>
  <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" >
  <?php if (!empty($systemErrors['password'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['password']); ?></small> 
                        <?php } ?>
</div>
  <div class="col-6 mt-3 ">
    <label>  Retype Password:</label>
    <input type="password"  id="pass" class="form-control" name="re-password" placeholder="Renter " aria-label=" Renter Password">
    <?php if (!empty($systemErrors['re-password'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['re-password']); ?></small> 
                        <?php } ?>
  </div>
  <div class="col-6 mt-3 ">
    Your Age:
    <input type="number" class="form-control" name="age" placeholder="Your age" aria-label="Your age">
    <?php if (!empty($systemErrors['age'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['age']); ?></small> 
                        <?php } ?>
  </div>
  <div class="col-6 mt-3">
  <select name="gender" class="form-select col-4" aria-label="Default select example">
  <option selected>Choose Gender</option>
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="other">Other</option>
  <?php if (!empty($systemErrors['gender'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['gender']); ?></small> 
                        <?php } ?>
</select>

</div>
<button type="submit" name="reg" style="background-color: #54BAB9;" class="btn btn mt-3 mb-5"> Register</button>
<button type="reset" style="background-color:#A68DAD ;" class="btn btn mt-3 mb-5 mx-3"> Reset</button>
</div>

</form>

</div>
  </div>
<div class="col"></div>
</main>