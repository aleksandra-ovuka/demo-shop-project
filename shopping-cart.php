<?php
session_start();
if(empty($_SESSION['cart'])) {
    header("Location: ./products-page.php");
}

// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

// USING MODELS
use Models\Product\Product;
use Lib\ShoppingCart\ShoppingCart;

try {
    $shoppingCart = new ShoppingCart($_SESSION['cart']);
    // REMOVE ITEMS
    if (isset($_POST['all'])) {session_destroy();
header('Location: ./products-page.php');}
    if(!empty($_POST['remove']) && is_array($_POST['remove'])) {
        foreach ($_POST['remove'] as $productId) {
            if(isset($_POST['down'])) { $shoppingCart->reduceQuantity(Product::getOneProductById($productId)); }
            if (isset($_POST['up'])) $shoppingCart->increaseQuantity(Product::getOneProductById($productId));
    if (!isset($_POST['down']) && !isset($_POST['up'])) $shoppingCart->removeProduct(Product::getOneProductById($productId));
            $shoppingCart->updateSession();
          
            if(empty($_SESSION['cart'])) {
                header("Location: ./products-page.php");
            }
        }
    }
    $cartItems = $shoppingCart->getItems();
} catch (\Throwable $th) {
    header("Location: ./page-not-found.php");
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
require __DIR__ . "/views/v_shopping-cart.php";
// FOOTER
require __DIR__ . "/views/_layout/v_footer.php";