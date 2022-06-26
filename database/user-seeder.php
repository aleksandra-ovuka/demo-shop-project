<?php 

/* * * mysql hostname ** */
$hostname = "localhost";
/* * * mysql username ** */
$username = "root";
/* * * mysql password ** */
$password = "";
/* * * mysql database name ** */
$database = "art-vases";

try {
    $connection = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ($products as $product) {
        $sqlQueryString = "INSERT INTO users (name, last_name, img, price, stock, available, barcode, category, brand)"
                        . " VALUES (" . ":title" . ", " . ":description" . ", " . ":img" . ", " . ":price" . ", " . ":stock" . ", "
                        . ":available" . ", " . ":barcode" . ", " . ":category" . ", " . ":brand". ")";
        $statement = $connection->prepare($sqlQueryString);
        $params = [
            'title' => $product["title"],
            'description' => $product["description"],
            'img' => $product["img"],
            'price' => $product["price"],
            'stock' => rand(1, 10),
            'available' => $product["available"],
            'barcode' => $product["id"],
            'category' => $product["category"],
            'brand' => $product["brand"],
        ];
        $status = $statement->execute($params);
    }
} catch (PDOException $exception) {
    echo "Something went wrong: " . $exception->getMessage() . "<br>";
}