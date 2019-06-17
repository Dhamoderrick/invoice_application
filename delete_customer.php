<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qwerty";

$id=$_GET['deleteid'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "DELETE FROM cusomer WHERE id='".$id."'";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script type='text/javascript'>alert('Deleted successfully!')</script>";
    header('Location: customer.php');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;

?>