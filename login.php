<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ./profile.php");
    exit;
}

$systemErrors = [];
//BUTTON
if (isset($_POST['login'])) {
// EMAIL
if (!empty($_POST['email'])) {
    $email = (string) $_POST['email'];
    $email = trim($email);}
    if(empty($email)) {
        $systemErrors['email'] = "Field email is required!";
    }
    if(empty($systemErrors['email']) && !str_contains($email, "@")) {
        $systemErrors['email'] = "Email must include @!";
    }
//PASSWORD
if (!empty($_POST['password'])) {
    $password = $_POST['password']; 
   $password= trim($password);
}
    if(empty($password)) {
        $systemErrors['password'] = "Password is required!";
    }



    try {
        if (empty($systemErrors)) {
           //CONNECTION
        $dsn = "mysql:host=localhost;dbname=art-vases";
            $pdo = new PDO ($dsn, "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
            //SQL
            $sql = "SELECT password FROM users WHERE email = :email";    
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->execute();
           
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $key=>$value){
                foreach ($value as $pass) {
            if (password_verify($password, $value['password']))  {
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $email;   
                header("location: ./success-login.php");  }
                else ($systemErrors['password']= "Invalid username or password");
      
            }}
        }
    }catch (\Throwable $th) {
            echo $th->getMessage();
         } }

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
require __DIR__ . "/views/v_login.php";
// FOOTER
require __DIR__ . "/views/_layout/v_footer.php";
