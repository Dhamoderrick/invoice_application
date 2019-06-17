<?php
include 'config.php';

$request = $_POST['request'];   // request

// Get username list
if($request == 1){
    $search = $_POST['search'];

    $query = "SELECT * FROM cusomer WHERE Name like'%".$search."%'";
    $result = mysqli_query($link,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['ID'],"label"=>$row['Name']);
    }

    // encoding array to json format
    echo json_encode($response);
    exit;
}

// Get details
if($request == 2){
    $userid = $_POST['userid'];
    $sql = "SELECT * FROM cusomer WHERE ID=".$userid;

    $result = mysqli_query($link,$sql);

    $users_arr = array();

    while( $row = mysqli_fetch_array($result) ){
        $name = $row['Name'];
        $area = $row['Area'];
        $contact = $row['Contact'];
        

        $users_arr[] = array("customername" => $name,"area" => $area, "contact" =>$contact);
    }

    // encoding array to json format
    echo json_encode($users_arr);
    exit;
}
