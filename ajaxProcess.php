<?php

require './connect_db.php';
$type = $_GET["type"];
session_start();

 if ($type == "acceptReq") {

    $crop_id = $_GET["key"];
 
   $sqlCheck = "update crops set status=1 ,accdated=now() where crop_id='".$crop_id."'";
    

   if ($conn->query($sqlCheck)) {
        
                $data=array();
                $data['status']="true";
                 $conn->close();
                 echo json_encode($data);
        }
    else{
        $data=array();
                $data['status']="false";
                 $conn->close();
                 echo json_encode($data);
    }
}

  
 if ($type == "rejectReq") {

    $crop_id = $_GET["key"];
 
   $sqlCheck = "update crops set status=2, rejdated=now() where crop_id='".$crop_id."'";
    

   if ($conn->query($sqlCheck)) {
        
                $data=array();
                $data['status']="true";
                 $conn->close();
                 echo json_encode($data);
        }
    else{
        $data=array();
                $data['status']="false";
                 $conn->close();
                 echo json_encode($data);
    }
}
?>