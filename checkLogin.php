
      <?php

            session_start();
            require 'connect_db.php';
            $uid=$_POST['uid'];
            $pwd=$_POST['pwd'];
            $type=$_POST['type'];
            
            echo $uid;
            
            $sqlCheck="";
            if($type=='merchant'){
                $sqlCheck="select mid,mname,email,mbno from merchants where mid='".$uid."' and pwd='".$pwd."'";
           
            }
            else{
                $sqlCheck="select fid,fname,email,mbno from farmers where fid='".$uid."' and pwd='".$pwd."'";
           
            }
          
             $result=$conn->query($sqlCheck);
            
                if(!$result){
                     echo "Error: " . $sqlCheck . "<br>" . $conn->error;
                }
                else{
                   if($result->num_rows==1){
                       $row=$result->fetch_assoc();
                       if($type=="merchant"){
                           $_SESSION["type"]="merchant";
                            $_SESSION["id"]=$row["mid"];
                            $_SESSION["name"]=$row["mname"];
                            $_SESSION["email"]=$row["email"];
                            $_SESSION["mbno"]=$row["mbno"];
                            header("location:initial_page.php");
                       }else{
                             $_SESSION["type"]="farmer";
                            $_SESSION["id"]=$row["fid"];
                            $_SESSION["name"]=$row["fname"];
                            $_SESSION["email"]=$row["email"];
                            $_SESSION["mbno"]=$row["mbno"];
                            header("location:initial_page.php");
                       }
                            
                   }
                   else{
                        include './login.php';
                        ?>
  
<script>
        $("#loginForm").append(" <div class='divOutput'><span class='spanOp'>Invalid username or password<span></div>");
</script>
                        <?php
                   }
                }
                $conn->close();
        ?>
       


