<?php
        include './headerAdmin.php';
        $type=$_GET['type'];
?>

<script>
      
      
      
        $(document).ready(function() {
    $('#loginForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            uid: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply User Id'
                    }
                }
            },
            pwd: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    }                    
                }
            },
        }
    })
        //.on('success.form.bv', function(e) {
            //$('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
          //      $('#loginForm').data('bootstrapValidator').resetForm();
              //  
            //   e.preventDefault();
            //var $form     = $(e.target),
              //  validator = $form.data('bootstrapValidator');
 //  $('#loginForm').submit();
            // Prevent form submission
            //e.preventDefault();

            // Get the form instance
           // var $form = $(e.target);

            // Get the BootstrapValidator instance
            //var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            //$.post($form.attr('action'), $form.serialize(), function(result) {
              //  console.log(result);
            //}, 'json');
        //});
});



      
</script>    
<style>
    #success_message{ display: none;}
    
    td{
        border-top: 0px solid white !important;
    }
    .lpan{
            width: 700px;
    margin: auto;
        
    }
</style>
<div class="bd container">

           
            
       

    <form class="well form-horizontal lpan"  action="checkLogin.php" method="post" id="loginForm" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<?php
if($type=='merchant'){
echo "<legend>Merchant Login</legend>";
echo "<input type='hidden' name='type' value='merchant'/>";
}else{
 echo "<legend>Farmer Login</legend>";
echo "<input type='hidden' name='type' value='farmer'/>";   
}
?>
<!-- Text input-->

<div class="form-group">
  <label class="col-md-3 control-label">User Id</label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="uid" placeholder="User Id" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Password</label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input  name="pwd" placeholder="Password" class="form-control"  type="password"/>
    </div>
  </div>
</div>



<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" name="send" class="btn btn-warning" >Login <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
  

