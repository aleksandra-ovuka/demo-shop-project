<!DOCTYPE html>
<html lang="Jen">
    <head>
        <title>Art Vases</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
           <link href="./public/theme/css/custom.css" rel="stylesheet">
        <link href="./public/theme/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     

    </head>
    <body style="background-color:#FBF8F1;">
        <!--START HEADER -->
        <header class="row mb-5">
            <nav class="navbar navbar-expand-lg text" style="background-color:#54BAB9;color:bisque;">
                <div class="container-fluid">
                  <a style="color:#F7ECDE;margin-left:5%"class="navbar-brand" href="./index.php"> <b> Art <i> Vases</i> </b></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav" style="margin-left:35%;">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a style="color:#F7ECDE" class="nav-link active center <?php if($page == 'index') {
                                echo htmlspecialchars('active');
                                } ?> " aria-current="page" href="./">Home</a>
                      </li>
                      <li class="nav-item">
                        <a style="color:#F7ECDE" class="nav-link" <?php if(!empty($page) && $page == 'products') {
                                echo htmlspecialchars('active');  } ?>  href="./products-page.php">Products</a>
                      </li>
                      <li class="nav-item">
                        <a  style="color:#F7ECDE"class="nav-link" <?php if(!empty($page) && $page == 'register') {
                                echo htmlspecialchars('active');  } ?> href="./register.php"> Register</a>
                      </li>
                      <li class="nav-item">
                        <a  style="color:#F7ECDE"class="nav-link" <?php if( !empty($page) && $page == 'login') {
                                echo htmlspecialchars('active');  } ?> href="./login.php"> Login </a>
                      </li>
                      <li class="nav-item">
                        <a style="color:#F7ECDE" class="nav-link"  <?php if(!empty($page) && $page == 'about_us') {
                                echo htmlspecialchars('active');  } ?>  href="./about-us.php">About us</a>
                      </li>
                      <li class="nav-item">
                        <a style="color:#F7ECDE" class="nav-link" <?php if(!empty($page) && $page == 'contact_us') {
                                echo htmlspecialchars('active');  } ?>   href="./contact-us.php">Contact us</a>
                      </li>
                      <li class="nav-item">
                        <a style="color:#F7ECDE" href="./shopping-cart.php" class="nav-link position-relative ">My Cart <i class="fa fa-shopping-cart"></i><span class="position-absolute top-0.5 start-100 translate-middle badge rounded-pill bg-danger"> 
                          <?php   if (!empty($_SESSION['cart']) && is_array($_SESSION['cart'])) {
      
                            echo count($_SESSION['cart']);
                           
                          }   else echo 0; ?>
                         </span>  </a>
                      </li>
                      <li class="nav-item">
                        <a style="color:#F7ECDE" class="nav-link"  href="./profile.php"> <?php if(isset($_SESSION['username'])) { if(!empty($rows))foreach ($rows as $key) { echo "Hello"." " .$key['name']."!";} }  ?> <i class="fa fa-user" aria-hidden="true"></i> </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>


        </header>
      <!--END HEADER -->