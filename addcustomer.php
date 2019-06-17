<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qwerty";

$ID = $_POST["id"];
$Customer_name = $_POST["cname"];
$Area = $_POST["area"];
$Contact = $_POST["contact"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO cusomer (ID,Name,Area,Contact)
    VALUES ('$ID', '$Customer_name', '$Area','$Contact')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    header('Location: customer.php');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>

