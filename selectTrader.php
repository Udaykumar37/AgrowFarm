

<?php
        include './headerAdmin.php';
        
          require_once './connect_db.php';
           
                    $sql="select * from merchants";
                    //echo "$sql";
                    $result=$conn->query($sql);
                if($result->num_rows){
                   
                        
?>

<script>
      
      
      function calcPrice(){
          if($('#crop').val()!="" && $('#qty').val()!=""){
              qty=$('#qty').val();
              if($('#crop').val()=="Tomato"){
                  $('#price').val(40*qty);
              }else if($('#crop').val()=="Paddy"){
                  $('#price').val(20*qty);
              }else if($('#crop').val()=="Brinjal"){
                  $('#price').val(70*qty);
              }else{
                  $('#price').val(80*qty);
              }
          }
      }
      
      
        $(document).ready(function() {
    $('#cropForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            crop: {
                validators: {
                        notEmpty: {
                        message: 'Please select Crop'
                    }
                }
            },
            trader: {
                validators: {
                    notEmpty: {
                        message: 'The Trader is required and can\'t be empty'
                    }                    
                }
            },
            qty: {
                validators: {
                    notEmpty: {
                        message: 'The Quantity is required and can\'t be empty'
                    }                    
                }
            },
            
        }
    })
        //.on('success.form.bv', function(e) {
            //$('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
              //  $('#loginForm').data('bootstrapValidator').resetForm();
              //  
          //     e.preventDefault();
           // var $form     = $(e.target),
            //    validator = $form.data('bootstrapValidator');
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

           
            
       

    <form class="well form-horizontal lpan"  action="saveCrops.php" method="post" id="cropForm" enctype="multipart/form-data">
<fieldset>
<legend>Select Trader</legend>
<!-- Form Name -->
<!-- Text input-->

<div class="form-group"> 
  <label class="col-md-4 control-label">Select Crop</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="crop" class="form-control selectpicker" id="crop" onchange="calcPrice()">
       <option value="">Select</option> 
      <option value="Tomato">Tomato</option>
      <option value="Paddy">Paddy</option>
      <option value="Brinjal">Brinjal</option>
      <option value="Turmeric">Turmeric</option>

    </select>
  </div>
</div>
</div>

<div class="form-group"> 
  <label class="col-md-4 control-label">Select Trader</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="trader" class="form-control selectpicker" id="trader">
        <option value="">Select</option> 
        <?php
            while($row = $result->fetch_assoc()){
                
      echo "<option value='".$row['mid']."'>".$row['mname']."</option>";

           }
                }?>

    </select>
  </div>
</div>
</div>



<div class="form-group">
  <label class="col-md-3 control-label">Quantity</label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-shopping-bag"></i></span>
  <input  name="qty" placeholder="Quantity" class="form-control" id="qty" type="text" onblur="calcPrice()"/>
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-3 control-label">Price</label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-rupee" style="font-size:20px"></i></span>
  <input  name="price" placeholder="Price" class="form-control"  type="text" id="price">
    </div>
  </div>
</div>




<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" name="request" class="btn btn-warning" >Request <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
  
