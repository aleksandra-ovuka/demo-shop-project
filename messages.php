<?php 

session_start();
if(!isset($_SESSION["loggedin"])){
    header("location: ./login.php");
    exit;
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("location: ./login.php");
    exit;
}
$dsn = "mysql:host=localhost;dbname=art-vases";
    $pdo = new PDO ($dsn, "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM contact;";  
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $mrows = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
require __DIR__ . "/views/v_messages.php";
// FOOTER
require __DIR__ . "/views/_layout/v_footer.php";










?> 