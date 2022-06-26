<?php 
session_start();

$systemErrors=[];
//NAME
if (!empty($_POST['name'])) {
    $pname = (string) $_POST['name'];
    $pname = trim($pname); }

//LAST NAME 
if (!empty($_POST['last_name'])) {
    $plastname = (string) $_POST['last_name'];
    $plastname = trim($plastname); }

//EMAIL 
if (!empty($_POST['email'])) {
    $pemail = (string) $_POST['email'];
    $pemail = trim($pemail);

    if(empty($systemErrors['email']) && !str_contains($pemail, "@")) {
        $systemErrors['email'] = "Mail must include @!";
    }}

//AGE 
if(!empty($_POST['age'])) {
    $p_age = $_POST['age'];
}

//GENDER 
if(isset($_POST['gender'])) {
    $pgender = $_POST['gender'];
    
}
//PASSWORD 
if (!empty($_POST['password'])) {
    $uppercase = preg_match('@[A-Z]@', $regpassword);
    $lowercase = preg_match('@[a-z]@', $regpassword);
    $number = preg_match('@[0-9]@', $regpassword);
     if(!$uppercase || !$lowercase || !$number || strlen($regpassword) < 6) { 
        $systemErrors['password'] = "Password must contain an uppercase letter, lowercase letter and a number and has to be atleast 6 characters long!"; }}


    
     
        // CONNECTION
        $id=$_SESSION["username"];
        $dsn = "mysql:host=localhost;dbname=art-vases";
        $pdo = new PDO ($dsn, "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//CHANGE NAME
if(!empty($pname) && isset($_POST['save']))  {
    $sql = "UPDATE users SET  name = :name WHERE email = :id ";  
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $pname);  
    $stmt->bindValue(':id', $id);  
    $stmt->execute();
    $sql = "SELECT * FROM users"; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
   foreach ($row as $key)
    if ($key['name']==$pname)  {
        header('Location: ./success-change.php');
    
    }
}

//CHANGE LAST NAME
if(!empty($plastname) && isset($_POST['save']))  {
    $sql = "UPDATE users SET last_name = :last_name WHERE email = :id ";  
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':last_name', $plastname);  
    $stmt->bindValue(':id', $id);  
    $stmt->execute();
    $sql = "SELECT * FROM users"; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
   foreach ($row as $key)
   var_dump($key['last_name']);
    if ($key['last_name']==$plastname) {
        header('Location: ./success-change.php');
    
    }
}

//CHANGE AGE
if(!empty($p_age) && isset($_POST['save']))  {
    $sql = "UPDATE users SET age = :age WHERE email = :id ";  
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':age', $p_age);  
    $stmt->bindValue(':id', $id);  
    $stmt->execute();
    $sql = "SELECT * FROM users"; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
   foreach ($row as $key)
    if ($key['age']==$p_age) {
        header('Location: ./success-change.php');
    
    }
}

//CHANGE EMAIL
if(!empty($pemail) && isset($_POST['save']))  {
    $sql = "UPDATE users SET email = :email WHERE email = :id ";  
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $pemail);  
    $stmt->bindValue(':id', $id);  
    $stmt->execute();
    $sql = "SELECT * FROM users"; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
   foreach ($row as $key)
    if ($key['email']==$pemail) {
        $_SESSION["username"] = $pemail;
        header('Location: ./success-change.php');
    
    }
}

//CHANGE GENDER
if(isset($pgender) && isset($_POST['save']))  {
    $sql = "UPDATE users SET gender = :gender WHERE email = :id ";  
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':gender', $pgender);  
    $stmt->bindValue(':id', $id);  
    $stmt->execute();
    $sql = "SELECT * FROM users"; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
   foreach ($row as $key)
    if ($key['gender']==$pgender) {
        header('Location: ./success-change.php');
    
    }
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
require __DIR__ . "/views/v_edit-profile.php";
// FOOTER
require __DIR__ . "/views/_layout/v_footer.php";