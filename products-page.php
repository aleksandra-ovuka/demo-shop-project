<?php 

session_start();
// PAGE TITLE
$page = "products";

if (!empty($_GET['page'])) {
    $pagPage = $_GET['page'];
} else {
    $pagPage = 1;
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
    // GET PRODUCTS
    $products = Product::getAvailableProducts($pagPage);

    // TERM AND SORT
    $term = "";
    $sort = "";
    $category= "";
    if (!empty($_GET['term'])) {
        $term = $_GET['term'];
    }
    if (!empty($_GET['sort'])) {
        $sort = $_GET['sort'];
    }
    if (!empty($_GET['category'])) {
        $category = $_GET['category'];
    }
    if ($term != "") {
        $products = Product::filteredProducts($term, $products);
    }
    if ($sort != "") {
        $products = Product::sortProductBy($sort, $products);
    }
    if ($category != "") {
        $products = Product::sortByCategory($category, $products);
    }
    // SHOPPING CART (SESSION)
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $shoppingCart = new ShoppingCart($_SESSION['cart']);
    if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
        $shoppingCart->addToCart(Product::getOneProductById($_POST['product_id']));
        $shoppingCart->updateSession();
    }
} catch (\Throwable $th) {
    header("Location: ./");
}

//PROFILE ICON
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
require __DIR__ . "/views/v_all-products.php";
// FOOTER
require __DIR__ . "/views/_layout/v_footer.php";
