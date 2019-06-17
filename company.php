<!DOCTYPE html>
<html>
<head>
	<title>Company</title>
	<link rel="stylesheet" href="css/dashboard.css">
</head>
<body class="">
  <a href="generatebill.php"><<
    back</a>
    <div class="page">
    	<div class="flex-fill">
      		<div class="my-3 my-md-5">
        		<div class="container">
         			 <div class="row">
                        <div class="col-lg-8">
                  			<form class="card" action="addcompany.php" method="POST">
                 			 	<div class="card-body">
                    				<h3 class="card-title">Create Company</h3>
                    				<div class="row">
                      					<div class="col-md-12">
                        					<div class="form-group">
                          						<label class="form-label">Company</label>
                          						<input type="text" class="form-control" name="company" placeholder="Company">
                        					</div>
                      					</div>
                      					<div class="col-md-12">
                        					<div class="form-group">
                          						<label class="form-label">GSTIN Number</label>
                          						<input type="text" class="form-control" name="tin" placeholder="GSTIN Number">
                        					</div>
                      					</div>                      
                      					<div class="col-sm-6 col-md-6">
                        					<div class="form-group">
                          						<label class="form-label">Mobile Number-1</label>
                          						<input type="text" class="form-control" name="mob1" placeholder="Number-1">
                        					</div>
                      					</div>
                      					<div class="col-sm-6 col-md-6">
                        					<div class="form-group">
                          						<label class="form-label">Mobile Number-2</label>
                          						<input type="text" class="form-control" name="mob2" placeholder="Number-2">
                        					</div>
                      					</div>
                      					<div class="col-md-12">
                        					<div class="form-group">
                          						<label class="form-label">Address</label>
                          						<input type="text" class="form-control" name="addr" placeholder="Address">
                        					</div>
                      					</div>
                      					<div class="col-sm-6 col-md-4">
                        					<div class="form-group">
                          						<label class="form-label">City</label>
                          						<input type="text" class="form-control" name="city" placeholder="City">
                        					</div>
                      					</div>
                      					<div class="col-sm-6 col-md-3">
                        					<div class="form-group">
                          						<label class="form-label">Postal Code</label>
                          						<input type="text" class="form-control" name="pin" placeholder="PIN Code">
                        					</div>
                      					</div>     
                    				</div>
                 			 	</div>
                  				<div class="card-footer text-right">
                    				<button type="submit" class="btn btn-primary">Create</button>
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