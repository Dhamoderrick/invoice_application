<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qwerty";

$company_name = $_POST["company"];
$address = $_POST["addr"];
$mobile_1 = $_POST["mob1"];
$Mobile_2 = $_POST["mob2"];
$gstin = $_POST["tin"];
$city = $_POST["city"];
$pin = $_POST["pin"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO company (company_name,Address,Mobile_number1,Mobile_number2,GSTIN,City,PIN)
    VALUES ('$company_name', '$address','$mobile_1','$Mobile_2','$gstin','$city','$pin')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    header('Location: welcome.php');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>

