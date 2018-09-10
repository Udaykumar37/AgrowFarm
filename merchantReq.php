<?php
        include './headerAdmin.php';
?>
<script>
    function acceptReq(x){

            var url="ajaxProcess.php?type=acceptReq&key="+x;
            $.ajax({
                type :  "GET",
                url:  url,
                dataType: 'json',
                processData: true,
                beforeSend: function () {
                            console.log(url);
                        },
                success: function (data) {
                        console.log(data);
                        
                        if(data.status=="true"){
                            $("."+x).remove();
                            alert("Request Accepted");
                        
                    }else{
                            alert("Request Rejected");
                       
                    }
 
                    },
                error: function (err,xhr) {
                        console.log("error"+err.Message);
                    }    
            });
        
        
    }
    
    function rejectReq(x){

            var url="ajaxProcess.php?type=rejectReq&key="+x;
            $.ajax({
                type :  "GET",
                url:  url,
                dataType: 'json',
                processData: true,
                beforeSend: function () {
                            console.log(url);
                        },
                success: function (data) {
                        console.log(data);
                        
                        if(data.status=="true"){
                            $("."+x).remove();
                            alert("Request Rejected");
                         
                    }else{
                        
                      
                            alert("Request Accepted");
                       
                    }
 
                    },
                error: function (err,xhr) {
                        console.log("error"+err.Message);
                    }    
            });
        
        
    }
</script>
<style>
    .table{
        background-color: efefef;
    }
    .th{
        font-size: 30px;
    }
    </style>
<div class="bd container">
    <center>

    

    <table class="table table-responsive table-bordered">
            <tr>
                <th>S No</th>
                <th>Farmer Name</th>
<th>Address</th><th>Crop</th><th>Year</th><th>Quantity</th><th>Amount</th><th>Status</th>
            </tr>
            <?php
            
                 require_once './connect_db.php';
           
                    $sql="select crop_id,crop_name,price,extract(year from reqdated) as year,qty,f.fname,f.address 
                        from crops c inner join  merchants m on c.mid=m.mid inner join 
farmers f on f.fid=c.fid  where c.mid='".$_SESSION['id']."' and c.status=0";
                    $result=$conn->query($sql);
                    $i=1;
                if($result->num_rows){
                    while($row = $result->fetch_assoc()){
                           echo "<tr class='".$row['crop_id']."'>";
                           echo "<td>".$i."</td>";
echo "<td>" . $row['fname'] . "</td>";
echo "<td>" . $row['address'] . "</td>";
echo "<td>" . $row['crop_name'] . "</td>";
echo "<td>" . $row['year'] . "</td>";
echo "<td>" . $row['qty'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "<td><input type='button' value='Accept' onclick=\"acceptReq('".$row["crop_id"]."');\"/>&nbsp;&nbsp;"
        . "<input type='button' value='Reject' onclick=\"rejectReq('".$row["crop_id"]."');\"/></td>";
echo "</tr>";
                $i++;
                    }
                }  
                
                $conn->close;
            ?>
            
    </table> </center>
</div>

