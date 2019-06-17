<!DOCTYPE html>
<html>
<head>
  	<title></title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body class="">
  <a href="stock.php"><<
    back</a>
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
                <div class="wrapper">
                	<form class="card" action="update.php" method="POST">
                		<div class="card-body p-6">
                      <?php
                          $conn = mysqli_connect("localhost", "root", "", "qwerty");
                          // Check connection
                          if ($conn->connect_error) 
                          {
                            die("Connection failed: " . $conn->connect_error);
                          }
                          //getting row id for row editing function 
                          $eid=$_GET['editid'];
                          $sql = "SELECT * FROM stock WHERE id = {$eid}";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) 
                          {
                          // output data of each row
                            while($row = $result->fetch_assoc()) 
                            {
            
                              echo" <div class='form-group'>
                              <label class='form-label'>ID</label>
                              <input type='text' class='form-control' name='id' value='".$row['ID']."'>
                              </div>";
                              echo"<div class='form-group'>
                              <label class='form-label'>Product_name</label>
                              <input type='text' class='form-control' name='name' value='".$row['Product_name']."'>
                              </div>";
                              echo"<div class='form-group'>
                              <label class='form-label'>Unit_measure</label>
                              <input type='text' class='form-control' name='unit' value='".$row['Unit_measure']."'>
                              </div>";
                              echo"<div class='form-group'>
                              <label class='form-label'>Quantity</label>
                              <input type='text' class='form-control' name='qty' value='".$row['Qty']."'>
                              </div>";
                              echo "<div class='col-sm-6 col-md-6'>
                              <div class='form-group'>
                              <label class='form-label'>Tax</label>                            
                              <input type='text' class='form-control' placeholder='%' name='percent' value='".$row['Tax']."'>
                              </div>
                              </div>";
                              echo"<div class='col-sm-6 col-md-6'>
                              <div class='form-group'>
                              <input type='text' class='form-control' placeholder='Amount' name='tax_amount' value='".$row['Amount']."'>
                              </div>
                              </div>";
                              echo"<div class='form-group'>
                              <label class='form-label'>Price</label>
                              <input type='text' class='form-control' name='price' value='".$row['Price']."'>
                              </div>";
                              //pass id from this page to update.php page .......from eid -----> updateid
                               echo "<input type='hidden' name='eid' value='".$row['ID']."'>";
                            }
                          } else { echo "0 results"; }
                          $conn->close();
                     ?>
                    <div class="form-group">
                      <div class="text-right">
                        <input type="submit" class="btn btn-primary" value="Edit">
                      </div>                    
                    </div>               			
                	</div>
                </form>
              </div>    
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>