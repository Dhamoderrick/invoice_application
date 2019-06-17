<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qwerty";

$ID = $_POST["id"];
$Product_name = $_POST["name"];
$Unit_measure = $_POST["unit"];
$Qty = $_POST["qty"];
$Tax = $_POST["percent"];
$Amount = $_POST["tax_amount"];
$Price = $_POST["price"];

$updateid = $_POST["eid"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE stock SET ID = '$ID', Product_name = '$Product_name', Unit_measure = '$Unit_measure', Qty = '$Qty',Tax='$Tax',Amount='$Amount', Price ='$Price' WHERE id = {$updateid}";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script type='text/javascript'>alert('Updated successfully!')</script>";
    header('Location: stock.php');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>