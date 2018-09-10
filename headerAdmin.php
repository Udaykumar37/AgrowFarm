  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/bootstrap.min.css">
  <script type="text/javascript" src="scripts/script.js"></script>
       <link rel="stylesheet" href="styles/style.css"/>
       <link rel="stylesheet" href="styles/bootstrap.min.css">
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
  
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>  
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
 <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> --> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>
  
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
  </style> 
        <style>
            
       .divOutput {
    width: 70%;
    height: 50px;
    background: #f5f5f5;
    border: 1px solid #cdcdcd;
    display: table;
    text-align: center;
    border-radius: 5px;
    margin-left: 55px; 
}

.divOutput span {
    display: table-cell;
    vertical-align: middle;
    padding-left: 20px;
     font-size: 20px;
     color: green;
}
            a{
                color:red;
            }
            .mainBg{
                background-image:url('projImages/gg.jpg');
                background-repeat: y-repeat;
                  height: 100%; 
    background-position: inherit;
    background-size: cover;
    color: #632929;
             
            }
            nav{
                margin-top: 0px;
                padding-bottom: 5px;
                padding-top: 5px;
                opacity: 0.7;
            } 
          .bd{
              margin-top: 120px;
              display: none;
          }
          .navbar{
              font-size: 15px;
              font-weight: 10px;
              color: white;
          }
 
      </style>
  <style>

/*#srid {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}*/
#details{float:left;list-style:none;margin-top:-3px;padding:0;width:500px;position: absolute;}
#details li{color:black;padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;border-radius: 5px;}
#details li:hover{background:#ece3d2;cursor: pointer;}
#search{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
.aaa{display: inline}
    </style> 
  <script>
      $(document).ready(function(){
    $(".bd").fadeIn();
});
        if(window.location.pathname.split('/').pop()=="initial_page.php"){
         history.pushState("null","null",document.title);
                window.addEventListener('popstate',function(){
                    history.pushState("null","null",document.title);
                });
                
           }    
      /*   function showSuggest(){
             console.log($("#search").val());
            if($("#search").val().length>0){
            $.ajax({
                type :  "GET",
                url: "ajaxProcess.php?type=search&key="+$("#search").val(),
                dataType: 'json',
                processData: true,
                success: function (data) {
                        console.log(data.data);
                        $("#suggest").html(data.data);
                        $("#search").css("background","#FFF");
                    },
                error: function (error) {
                        console.log("error"+error);
                    }    
            });
        }
        else{
            $("#suggest").html("");
        }
        }
        
        function selectitem(x){
            $("#search").val(x);
            $("#suggest").hide();
            $("#searchForm").submit();
        }   */    
  </script>
<?php
    session_start();
?>
  <body class="mainBg">  
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
      <div style="padding-left: 450px;">
      <div class="navbar-header">
          <a class="navbar-brand" href="initial_page.php" style="color: white;font-size: 50px">Agrow Farm</a>
    </div>
    
     
          
          <?php
                if(!isset($_SESSION["type"])){
                    ?>
            <ul class="nav navbar-nav" style="padding-left: 60px;">
                        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Login
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="login.php?type=merchant">Login as Merchant</a></li>
          <li><a href="login.php?type=farmer">Login as Farmer</a></li>
        </ul>
      </li>
                    
                        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="signupHosp.php">New ? SignUp
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="signUp.php?type=merchant">SignUp as Merchant</a></li>
          <li><a href="signUp.php?type=farmer">SignUp as Farmer</a></li>
        </ul>
      </li>
               <?php }
                else if($_SESSION["type"]=="farmer"){
                    echo "<ul class='nav navbar-nav' style='padding-left: 60px;'>";
                     echo "<li><a href='#'>Hello..".$_SESSION["name"]."</a></li>";
                    echo "<li><a href='selectTrader.php'>Select Trader</a></li>";
                    echo "<li><a href='farmerSummery.php'>History</a></li>";
                    echo "<li><a href='logout.php'>Logout</a></li>";
                   
                }
                else{
                    echo "<ul class='nav navbar-nav' style='padding-left: 20px;'>";
                    echo "<li><a href='#'>Hello..".$_SESSION["name"]."</a></li>";
                    echo "<li><a href='merchantReq.php'>Requests</a></li>";
                    echo "<li><a href='merchantSummery.php'>History&nbsp;&nbsp;</a></li>";
                    echo "<li><a href='cartDetails.php'>Market Price&nbsp;&nbsp;</a></li>";

                    echo "<li><a href='logout.php'>Logout</a></li>";
                }
                ?>
    </ul>
    </div>
  </div>
    <span id="suggest" ></span>
 
</nav>
     


