<?php 
session_start();




try{
    if(isset($_POST['upload'])) {
    $systemErrors=[];

//TITLE
if(!empty($_POST['title'])) {
    $title = $_POST['title'];
    
}

if (empty($title)) {
    $systemErrors['title'] = "Please enter the title of your product!";
}
//DESCRIPTION
if(!empty($_POST['description'])) {
    $description = $_POST['description'];
}
if (empty($description)) {
    $systemErrors['description'] = "Please enter the description of your product!";
}
//STOCK
if(!empty($_POST['stock'])) {
    $stock = $_POST['stock'];
}
if (empty($stock)) {
    $systemErrors['stock'] = "Please enter how many products you have in stock!";
}
//BARCODE 
if(!empty($_POST['barcode'])) {
    $barcode = $_POST['barcode'];
}
if (empty($_POST['barcode'])) {
    $systemErrors['barcode'] = "Please enter the barcode of your product!";
}
// STATUS
if(isset($_POST['status'])) {
    $available = $_POST['status'];
}

//CATEGORY
if(isset($_POST['category'])) {
    $category = $_POST['category'];
}

//BRAND 
if(!empty($_POST['brand'])) {
    $brand = $_POST['brand'];
}
if (empty($brand)) {
    $systemErrors['brand'] = "Please enter the brand of your product!";
}

//PRICE 
if(!empty($_POST['price'])) {
    $price = $_POST['price'];
}
if (empty($price)) {
    $systemErrors['price'] = "Please enter the price of your product!";
}

//IMAGE
$targetDir = "storage/uploads/";

//$allowTypes = array('jpg','png','jpeg','gif','pdf');
if( !empty($_FILES["file"]["name"])) {
    $file = basename($_FILES["file"]["name"]);
    $image = $targetDir . $file;
    $fileType = pathinfo($image,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["file"]["tmp_name"], $image);
}
    
if(empty($image)) {
    $systemErrors['image'] = "Please upload a photo of your product!";
}







if (empty($systemErrors) && isset($_POST['upload'])) {
  
     // CONNECTION
     $id=$_SESSION["username"];
     $dsn = "mysql:host=localhost;dbname=art-vases";
     $pdo = new PDO ($dsn, "root", "");
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="INSERT INTO products (title, description, img, price, stock, available, barcode, category, brand) VALUES ( :title, :description, :img, :price, :stock, :available, :barcode, :category, :brand);";
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':title',$title);
    $stmt->bindValue(':stock',$stock);
    $stmt->bindValue(':available',$available);
    $stmt->bindValue(':barcode',$barcode);
    $stmt->bindValue(':category',$category);
    $stmt->bindValue(':brand',$brand);
    $stmt->bindValue(':img',$image);
    $stmt->bindValue(':description',$description);
    $stmt->bindValue(':price',$price);
   
   
    $results = $stmt->execute();
   
    if($results==true && empty($systemErrors) )  {
        header('Location: ./success-product.php');
        $_SESSION['barcode']=$barcode;
    }}
}
}   catch (\Throwable $th) {
   echo $th->getMessage();
}





if (isset($_SESSION["username"])) {
    $id=$_SESSION["username"];
    $dsn = "mysql:host=localhost;dbname=art-vases";
        $pdo = new PDO ($dsn, "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM users WHERE email LIKE :email;";  
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $id);  
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);}




// HEADER
require __DIR__ . "/views/_layout/v_header.php";
// PAGE
require __DIR__ . "/views/v_create-product.php";
// FOOTER
require __DIR__ . "/views/_layout/v_footer.php";