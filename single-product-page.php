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

$productId = null;
$systemErrors = [];

try {
    // GET ONE PRODUCT AND RELATED
    if (!empty($_GET['page'])) {
        $product = Product::getOneProductById($_GET['page']);
        $relatedProducts= (array) $product->getRelatedProducts();
    }

    // SHOPPING CART (SESSION)
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $shoppingCart = new ShoppingCart($_SESSION['cart']);
    if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
        if(isset($_POST['quantity']) && is_numeric($_POST['quantity']) && $_POST['quantity'] > 0) {
            $shoppingCart->addToCart(Product::getOneProductById($_POST['product_id']), $_POST['quantity']);
            $shoppingCart->updateSession();
        } else {
            $systemErrors['quantity'] = "Not valid Quantity";
        }
    }
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
require __DIR__ . "/views/v_single-product.php";
// FOOTER
require __DIR__ . "/views/_layout/v_footer.php";
