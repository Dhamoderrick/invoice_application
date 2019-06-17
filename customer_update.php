<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qwerty";

$ID = $_POST["id"];
$Customer_name = $_POST["cname"];
$Area = $_POST["area"];
$Contact = $_POST["contact"];
$updateid = $_POST["eid"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE cusomer SET ID = '$ID', Name = '$Customer_name', Area = '$Area', Contact = '$Contact'  WHERE id = {$updateid}";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script type='text/javascript'>alert('Updated successfully!')</script>";
    header('Location: customer.php');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>