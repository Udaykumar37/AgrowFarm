<?php
        include './headerAdmin.php';
?>
<script>
    function showFarmSum(){
        $('#fSum').submit();
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
                <th>Year</th>
<th>Crop</th><th>Quantity</th><th>Amount</th><th>Farmer</th><th>Status</th>
            </tr>
            <?php
            
                 require_once './connect_db.php';
           
                    $sql="select crop_id,crop_name,price,reqdated as year,qty,case status when 0 then 'Requested' 
when 1 then 'Accepted' when 2 then 'Rejected' end as status,fname from crops c inner join  merchants m on c.mid=m.mid inner join 
farmers f on f.fid=c.fid  where c.mid='".$_SESSION['id']."'";
                    $result=$conn->query($sql);
                    $i=1;
                if($result->num_rows){
                    while($row = $result->fetch_assoc()){
                           echo "<tr>";
                           echo "<td>".$i."</td>";
echo "<td>" . $row['year'] . "</td>";
echo "<td>" . $row['crop_name'] . "</td>";
echo "<td>" . $row['qty'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "<td>" . $row['fname'] . "</td>";
echo "<td>" . $row['status'] . "</td>";
echo "</tr>";
                $i++;
                    }
                }  
                
                $conn->close;
            ?>
            
    </table> </center>
</div>

