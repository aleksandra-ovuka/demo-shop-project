<main class="mt-5">



<div class="container">
  <div class="row">
    <div class="col">
    <h2 style="color:#54BAB9"> Contact us!</h2>
    <div style="background-color: #F2EBE9;" class="col-12 mb-5">
   
                <form class="p-4" action="./contact-us.php" method="POST" style="border:hidden; border-radius: 10%;">
                    <div class="form-group">
                        <label style="color:#54BAB9" for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php  if(!empty($name)) echo htmlspecialchars($name); ?>">
                        <?php if (!empty($systemErrors['name'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['name']); ?></small> 
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label  style="color:#54BAB9" for="last-name">Last Name</label>
                        <input type="text" class="form-control" id="last-name" placeholder="Enter last name" name="last_name" value="<?php  if(!empty($last_name))   echo htmlspecialchars($last_name); ?>">
                        <?php if (!empty ($systemErrors['last_name'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['last_name']); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label style="color:#54BAB9" for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php  if (!empty($email)) echo htmlspecialchars($email); ?>">
                        <?php if (!empty($systemErrors['email'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['email']); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label  style="color:#54BAB9" for="message">Message</label>
                        <textarea class="form-control" id="message" placeholder="Comment" name="message" value= "<?php  if(!empty ($message)) echo htmlspecialchars($message); ?>"></textarea>
                        <?php if (!empty($systemErrors['message'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['message']); ?></small>
                        <?php } ?>
                    </div>
                    <button style="background-color:#54BAB9 ;" class="btn btn-primary mt-3" type="submit" name="send">Send Message </button>
                        </div>
                        
                        </form>
    </div>
    <div class="col-6">
     <img   src="./public/theme/image/vasespng.png"> 
    </div>
  </div>
                        </main>