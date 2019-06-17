<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qwerty";

$ID = $_POST["id"];
$Product_name = $_POST["pname"];
$Unit_measure = $_POST["unit_measure"];
$Qty = $_POST["qty"];
$percent = $_POST["percent"];
$amount = $_POST["tax_amount"];
$Price = $_POST["price"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO stock (ID,Product_name,Unit_measure,Qty,Tax,Amount,Price)
    VALUES ('$ID', '$Product_name', '$Unit_measure','$Qty','$percent','$amount','$Price')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    header('Location: stock.php');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>

