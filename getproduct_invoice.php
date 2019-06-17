<?php
include 'config.php';

$request = $_POST['request'];   // request

// Get username list
if($request == 1){
    $search = $_POST['search'];

    $query = "SELECT * FROM stock WHERE Product_name like'%".$search."%'";
    $result = mysqli_query($link,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['ID'],"label"=>$row['Product_name']);
    }

    // encoding array to json format
    echo json_encode($response);
    exit;
}

// Get details
if($request == 2){
    $userid = $_POST['userid'];
    $sql = "SELECT * FROM stock WHERE ID=".$userid;

    $result = mysqli_query($link,$sql);

    $users_arr = array();

    while( $row = mysqli_fetch_array($result) ){
        $name = $row['Product_name'];
        $unit = $row['Unit_measure'];
        $qty = $row['Qty'];
        $price = $row['Price'];
        $percentage = $row['Tax'];
        $amount = $row['Amount'];
        

        $users_arr[] = array("name" => $name,"unit" => $unit, "qty" =>$qty,"price"=>$price,"percentage"=>$percentage,"amount"=>$amount);
    }

    // encoding array to json format
    echo json_encode($users_arr);
    exit;
}
