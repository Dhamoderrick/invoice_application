<?php
  include_once("welcome.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href='jquery-ui.min.css' type='text/css' rel='stylesheet' >
   
</head>
<body>   
  <div class="card">
    <div style="padding-left: 85em;">
      <b>Date:</b>
      <input type="Date" name="date">
    </div>
    <div class="card-body">    
      <h5 class="card-title">Buyer Details</h5>
      <div class="form-row">         
       <div class="col-md-4 mb-3">
          <label>Name</label>
          <input type="text" class="form-control" id="customername_1" placeholder="Name">
       </div>
       <div class="col-md-4 mb-3">
          <label>Area</label>
          <input type="text" class="form-control" id="area_1" placeholder="Area" readonly="">
       </div>
       <div class="col-md-4 mb-3">
          <label>Contact</label>
          <input type="text" class="form-control" id="contact_1" placeholder="Contact" readonly="">
       </div>
              
    </div>    
  </div>
</div>

  <table class="table table-sm  table-bordered">
  <thead>
    <tr>
      <th scope="col" class="text-center">Sr.No</th>
      <th scope="col" class="text-center">Product Name</th>
      <th scope="col" class="text-center">Unit Measure</th>
      <th scope="col" class="text-center">Quantity</th>
      <th scope="col" class="text-center">Price</th>
      <th colspan="2" class="text-center">Tax</th>
      <th scope="col" class="text-center">Amount</th>
      <th><button type="button" class="btn btn-primary" id="add"><i class='fas fa-plus'></i></button></th>
    </tr>
  </thead>
  <tbody class="detail">
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td class="text-center">%</td>
      <td class="text-center">Amount</td>
      <td></td>
    </tr>
    
    <tr class="tr_input">
    <th scope="row" class="num">1</th>      
    <td><input type="text" class="form-control pname" id="productname_1" name="Name"></td>
    <td><input type="text" class="form-control" id="unitmeasure_1" name="unit" readonly=""></td>
    <td><input type="Number" class="form-control calculate" id="qty_1" name="quantity"></td>
    <td><input type="text" class="form-control calculate" id="price_1" name="price" readonly=""></td>
    <td><input type="percentage" class="form-control" id="percentage_1" name="percentage" readonly=""></td>
    <td><input type="Number" class="form-control" id="tax-amount_1" name="tax-amount" readonly=""></td>
    <td><input type="Number" class="form-control calculate_amount" id="amount_1" name="amount" readonly=""></td>
    <td><button type="button" class="btn btn-warning" value="Delete" onclick="deleteRow(this)"><i class='fas fa-trash-alt'></i></button></td>
    </tr> 
  </tbody>
  <tr>
    <td colspan="9" class="text-center invoice_sub_total"> Total</td>
  </tr>
</table>

<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="jquery-ui.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    //for adding Customer to this page
    $(document).ready(function(){

            $(document).on('keydown', '#customername_1', function() {
                
                var id = this.id;
                var splitid = id.split('_');
                var index = splitid[1];

                $('#'+id ).autocomplete({
                    source: function( request, response ) {
                        $.ajax({
                            url: "getcustomer_invoice.php",
                            type: 'post',
                            dataType: "json",
                            data: {
                                search: request.term,request:1
                            },
                            success: function( data ) {
                                response( data );
                            
                            }
                        });
                    },
                    select: function (event, ui) {
                        $(this).val(ui.item.label); // display the selected text
                        var userid = ui.item.value; // selected id to input

                        // AJAX
                        $.ajax({
                            url: 'getcustomer_invoice.php',
                            type: 'post',
                            data: {userid:userid,request:2},
                            dataType: 'json',
                            success:function(response){
                                
                                var len = response.length;

                                if(len > 0){
                                    
                                    var customername = response[0]['customername'];
                                    var area = response[0]['area'];
                                    var contact = response[0]['contact'];
                                    

                                    document.getElementById('customername_'+index).value = customername;
                                    document.getElementById('area_'+index).value = area;
                                    document.getElementById('contact_'+index).value = contact;
                                                      
                                }
                                
                            }
                        });

                        return false;
                    }
                    
                });
            });
          });
    //end


    //add product to invoice page

    $(document).ready(function(){
           

            $(document).on('keydown', '.pname', function() {
                
                var id = this.id;
                var splitid = id.split('_');
                var index = splitid[1];

                $('#'+id ).autocomplete({
                    source: function( request, response ) {
                        $.ajax({
                            url: "getproduct_invoice.php",
                            type: 'post',
                            dataType: "json",
                            data: {
                                search: request.term,request:1
                            },
                            success: function( data ) {
                                response( data );
                            
                            }
                        });
                    },
                    select: function (event, ui) {
                        $(this).val(ui.item.label); // display the selected text
                        var userid = ui.item.value; // selected id to input

                        // AJAX
                        $.ajax({
                            url: 'getproduct_invoice.php',
                            type: 'post',
                            data: {userid:userid,request:2},
                            dataType: 'json',
                            success:function(response){
                                
                                var len = response.length;

                                if(len > 0){
                                    
                                    var name = response[0]['name'];
                                    var unit = response[0]['unit'];
                                    var qty = response[0]['qty'];
                                    var price = response[0]['price'];
                                    var percentage = response[0]['percentage'];
                                    var amount = response[0]['amount'];
                                    

                                    document.getElementById('productname_'+index).value = name;
                                    document.getElementById('unitmeasure_'+index).value = unit;
                                    document.getElementById('qty_'+index).value = qty;
                                    document.getElementById('price_'+index).value = price;
                                    document.getElementById('percentage_'+index).value = percentage;
                                    document.getElementById('tax-amount_'+index).value = amount;
                                                                      
                                }
                                
                            }
                        });

                        return false;
                    }
                    
                });
            });
          });

    //add row
      function addnewrow() {
        
        // Get last id                
    var n=($('.detail tr').length-1)+1;
    var tr='<tr class="tr_input">'+
    '<th scope="row" class="num">'+n+'</th>'+
      '<td><input type="text" class="form-control pname" id="productname_'+n+'" name="product name"></td>'+
      '<td><input type="text" class="form-control" id="unitmeasure_'+n+'" name="unitmeasure_" readonly></td>'+
      '<td><input type="Number" class="form-control calculate" id="qty_'+n+'" name="quantity"></td>'+
      '<td><input type="text" class="form-control calculate" id="price_'+n+'" name="price" readonly></td>'+
      '<td><input type="text" class="form-control" id="percentage_'+n+'" name="percentage" readonly></td>'+
      '<td><input type="text" class="form-control" id="tax-amount_'+n+'" name="tax-amount" readonly></td>'+
      '<td><input type="Number" class="form-control calculate_amount" id="amount_'+n+'" name="amount" readonly></td>'+
      '<td><button type="button" class="btn btn-warning" value="Delete" onclick="deleteRow(this)"><i class="fas fa-trash-alt"></i></button></td>'+
    '</tr>';
    $('.detail').append(tr);
  }
  $(function()
  {
    $('#add').click(function()
    {
      addnewrow();
    });
    
  });
  //delete row
    function deleteRow(btn){
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
  }

  //amount calculation
  $(document).ready(function () {
    var n=($('.detail tr').length-1)+1;
    
        
    calculateTotal();
    
    $('.tr_input').on('change keyup paste', '.calculate', function() {
        updateTotals(this);
        calculateTotal();
    });

  function updateTotals(elem) {

        var tr = $(elem).closest('tr'),
            quantity = $('[name="quantity"]', tr).val(),
          price = $('[name="price"]', tr).val(),
            
          subtotal = parseInt(quantity) * parseFloat(price);
        
                   
      $('.calculate_amount', tr).val(subtotal.toFixed(2));
  }

  function calculateTotal(){
      
      var grandTotal = 0.0;
      var totalQuantity = 0;
      $('.calculate_amount').each(function(){
          grandTotal += parseFloat($(this).val()) ;
      });
      
      $('.invoice_sub_total').text(parseFloat(grandTotal ).toFixed(2) );  
  }
    
});
 
  </script>
</body>
</html>