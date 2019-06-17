<?php
  include_once("welcome.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>User</title>
</head>
<body>
	<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">user Name</th>
      <th scope="col">Password</th>
      <th scope="col">Created at</th>
      <th scope="col"><a href="register.php">Sign up</a></th>
    </tr>
  </thead>
  <tbody>
     <?php
$conn = mysqli_connect("localhost", "root", "", "qwerty");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT * FROM users";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo"<td>" . $row["id"]. "</td>";
    echo"<td>" . $row["username"] . "</td>";
    echo"<td>" . $row["password"] . "</td>";
    echo"<td>" . $row["created_at"] . "</td>";
    echo"<td>" . (isset($row[""])) . "</td>";
    echo"</tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
   </tbody>
</table>

</body>
</html>