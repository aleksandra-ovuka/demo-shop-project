<?php 
session_start();

// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";






// USING MODELS
use Models\Product\Product;
use Lib\ShoppingCart\ShoppingCart;
if(!empty($_SESSION['barcode']));{
$idproduct=$_SESSION['barcode'];
$product = Product::getOneProductByBarcode($idproduct);}





//PROFILE ICON
if ($_SESSION["loggedin"]==true) {
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
require __DIR__ . "/views/v_success_product.php";
// FOOTER
require __DIR__ . "/views/_layout/v_footer.php";
