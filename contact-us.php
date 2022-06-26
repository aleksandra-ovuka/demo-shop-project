<?php 
session_start();
$systemErrors = [];
if (isset($_POST['send'])) {
$name = (string) $_POST['name'];
$name = trim($name);
if(empty($name)) {
    $systemErrors['name'] = "Field name is required!";
}
// LAST NAME
$last_name = (string) $_POST['last_name'];
$last_name = trim($last_name);
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
    $systemErrors['email'] = "Email must include @!";
}
// MESSAGE
if (!empty($_POST['message'])) {
    $message = (string) $_POST['message'];}
if(empty($message)) {
    $systemErrors['message'] = "Please write a message.";
}
try {
    if (empty($systemErrors)) {
       
    $dsn = "mysql:host=localhost;dbname=art-vases";
        $pdo = new PDO ($dsn, "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
      
        
        if (empty($systemErrors)) {
        $sql="INSERT INTO contact (name, last_name, email, message) VALUES (:name, :last_name, :email, :message);";
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(':email',$email);
        $stmt->bindValue(':name',$name);
        $stmt->bindValue(':last_name',$last_name);
        $stmt->bindValue(':message',$message);
       
       
        $results = $stmt->execute();
       
        if($results && empty($systemErrors) )  {
            header('Location: ./success-contact.php');
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
require __DIR__ . "/views/v_contact_us.php";
// FOOTER
require __DIR__ . "/views/_layout/v_footer.php";






?>