<?php
    include_once("welcome.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Stock</title>
 </head>
<body>
 	<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Unit Of Measure</th>
      <th scope="col">Quantity</th>
      <th scope="col">Amount</th>
      <th scope="col"><a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary"><i class='fas fa-plus'></i></a></th>
    </tr>
  </thead>
  <tbody>
     <?php
$conn = mysqli_connect("localhost", "root", "", "qwerty");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT * FROM stock";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo"<td>" . $row['ID']. "</td>";
    echo"<td>" . $row["Product_name"] . "</td>";
    echo"<td>". $row["Unit_measure"]. "</td>";
    echo"<td>" . $row["Qty"]. "</td>";
    echo"<td>" . $row["Price"]. "</td>";
    echo"<td>
    <a href=\"delete.php?deleteid=".$row['ID']."\" class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
    <a href=\"edit.php?editid=".$row['ID']."\" class='btn btn-success'><i class='far fa-edit'></i></a>
    </td>";
       echo"</tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
   </tbody>
</table>

<!--------------------------------------------Add product------------------------------------------>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="stockinsert.php" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">ID</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="ID" name="id">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="pname">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Unit of Measure</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Unit" name="unit_measure">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Qty</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Qty" name="qty">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Tax</label>
              <div class="col">
                <input type="text" class="form-control" placeholder="%" name="percent">
              </div>
              <div class="col">
                <input type="text" class="form-control" placeholder="Amount" name="tax_amount">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Price" name="price">
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="Submit">ADD</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>