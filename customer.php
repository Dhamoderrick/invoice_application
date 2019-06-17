<?php
    include_once("welcome.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer</title>
 </head>
<body>
 	<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Area</th>
      <th scope="col">Contact</th>
      <th scope="col"><a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary"><i class='fas fa-user-plus'></i></a></th>
    </tr>
  </thead>
  <tbody>
     <?php
$conn = mysqli_connect("localhost", "root", "", "qwerty");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT * FROM cusomer";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo"<td>" . $row['ID']. "</td>";
    echo"<td>" . $row["Name"] . "</td>";
    echo"<td>". $row["Area"]. "</td>";
    echo"<td>" . $row["Contact"]. "</td>";
    echo"<td>
    <a href=\"delete_customer.php?deleteid=".$row['ID']."\" class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
    <a href=\"edit_customer.php?editid=".$row['ID']."\" class='btn btn-success'><i class='far fa-edit'></i></a>
    </td>";
       echo"</tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
   </tbody>
</table>

<!--------------------------------------------Add Customer------------------------------------------>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="addcustomer.php" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">ID</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="ID" name="cid">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Customer Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Customer Name" name="cname">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Area</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Area" name="area">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Contact</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Contact" name="contact">
              </div>
            </div> 
            <div class="modal-footer">
              <button class="btn btn-primary" type="Submit">ADD Customer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>