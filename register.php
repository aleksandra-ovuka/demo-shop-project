<?php 
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ./profile.php");
    exit;
}

require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

require_once __DIR__ . "/Models/User.php";
$page= "register";


if (isset ($_POST['reg'])) {
$systemErrors = [];


if (!empty($_POST['name'])) {
$name = (string) $_POST['name'];
$name = trim($name); }
if(empty($name)) {
    $systemErrors['name'] = "Field name is required!";
}
// LAST NAME
if (!empty($_POST['last_name'])) {
    $last_name = (string) $_POST['last_name'];
    $last_name = trim($last_name); }
if(empty($last_name)) {
    $systemErrors['last_name'] = "Field last name is required!";
}
// EMAIL
if (!empty($_POST['email'])) {
$email = (string) $_POST['email'];
$email = trim($email);}
if(empty($email)) {
    $systemErrors['email'] = "Field email is required!";
}
if(empty($systemErrors['email']) && !str_contains($email, "@")) {
    $systemErrors['email'] = "Mail must include @!";
}
//PASSWORD
if (!empty($_POST['password'])) {
$regpassword =$_POST['password']; }
if(empty($regpassword)) {
    $systemErrors['password'] = "Password is required!";
}
if (!empty($_POST['password'])) {
$uppercase = preg_match('@[A-Z]@', $regpassword);
$lowercase = preg_match('@[a-z]@', $regpassword);
$number = preg_match('@[0-9]@', $regpassword);
 if(!$uppercase || !$lowercase || !$number || strlen($regpassword) < 6) { 
    $systemErrors['password'] = "Password must contain an uppercase letter, lowercase letter and a number and has to be atleast 6 characters long!"; }}
// RE-PASSWORD
if (!empty($_POST['re-password'])) {
$re_password =$_POST['re-password'];}
    if(empty($re_password)) {
        $systemErrors['re-password'] = "You must repeat your password!";
    }
    if (!empty($regpassword) && !empty($re_password) && $re_password!==$regpassword) {
        $systemErrors['re-password'] = "Passwords must match!!";
    }
//GENDER
if(isset($_POST['gender'])) {
    $gender = $_POST['gender'];
    
}


if (!isset($gender)) {
    $systemErrors['gender'] = "Please choose your gender.";
}
//AGE
if(!empty($_POST['age'])) {
    $age = $_POST['age'];
}
if (empty($age)) {
    $systemErrors['age'] = "Please enter your age.";
}
if(!empty($age) && $age<18) {
    $systemErrors['age'] = "You have to be at least 18 to register on this site.";
}
//if(empty($systemErrors)) {
 //   header('Location: ./success.php');
//}

try {
if (empty($systemErrors)) {
   
$dsn = "mysql:host=localhost;dbname=art-vases";
    $pdo = new PDO ($dsn, "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  
    $sql = "SELECT count(email) AS num FROM users WHERE email LIKE :email;";    
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row['num']>0) {
        $systemErrors['email'] ="This email is already registered, please go to the Login page!";
    }
   
    $passwordHash = password_hash($regpassword, PASSWORD_DEFAULT);
    if (empty($systemErrors)) {
    $sql="INSERT INTO users (name, last_name, password, email, age, gender) VALUES (:name, :last_name, :password, :email, :age, :gender);";
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':password',$passwordHash);
    $stmt->bindValue(':name',$name);
    $stmt->bindValue(':last_name',$last_name);
    $stmt->bindValue(':age',$age);
    $stmt->bindValue(':gender',$gender);
   
   
    $results = $stmt->execute();
   
    if($results && empty($systemErrors) )  {
        header('Location: ./success-registration.php');
    }}

}  }  catch (\Throwable $th) {
   echo $th->getMessage();
}
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
require __DIR__ . "/views/v_register.php";
// FOOTER
require __DIR__ . "/views/_layout/v_footer.php";












?>