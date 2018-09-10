   <?php

            session_start();
            require 'connect_db.php';

            $crop = $_POST['crop'];
            $trader = $_POST['trader'];
            $qty = $_POST['qty'];
            $price = $_POST['price'];
          
           $sqlInsert="insert into crops (crop_name,mid,fid,price,qty,status,reqdated )"
                   . "values('".$crop."','".$trader."','".$_SESSION['id']."','".$price."','".$qty."','0',now())";
            
                    if(!$conn->query($sqlInsert)===TRUE){
                        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
                         echo "<center>Item Details Not Inserted</center>";
                        include './uploadItems.php'; 
                    }
                    else{
                        include './selectTrader.php';
                        ?>
  
<script>
        $("#cropForm").append(" <div class='divOutput'><span class='spanOp'>Request Successful<span></div>");
</script>
                        <?php
                   }
                
                $conn->close();
       


