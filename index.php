<html>
   <head>
      <meta charset='utf-8'>
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <title>Product</title>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <br>
      <br>
      <br>
      <div class="container-fluid">
      <!-- Form Name -->
      <div class="form-row">
         <div class="col-md-10">
            <legend>
               <h1> ADD PRODUCTS </h1>
            </legend>
         </div>
         <div class="col-md-2">
            <button type="button" class="btn btn-default btn-sm" id="clone_btn">
            ADD More
            </button>
         </div>
      </div>
      <form action="addproduct.php" method="post" autocomplete="off">
         <div class="form-row container-fluid">
            <div class="form-group col-md-3">
               <label for="Product Name">Product Name</label>
               <input type = "text" id="product_name" name="product_name[]" placeholder="PRODUCT NAME" class="form-control input-md" 
                  data-validation="length alphanumeric" 
                  data-validation-length="2-12"
                  data-validation-error-msg="Product name has to be an alphanumeric value (3-12 chars)">    
            </div>
            <div class="form-group col-md-3">
               <label for="Product Quantity">Product Quantity</label>
               <input type="text" id="product_quantity" name="product_quantity[]" placeholder="PRODUCT QUANTITY" class="form-control input-md" 
                  data-validation="number"
                  data-validation-allowing="range[1;100]">    
            </div>
            <div class="form-group col-md-2">
               <label for="Batch-date">Batch-Date</label>
               <input id="datepicker" name="product_batchdate[]" placeholder="BATCH DATE"
                  data-validation-help="yyyy/mm/dd"
                  data-validation="required"/>    
            </div>
            <div class="form-group col-md-2">
               <label for="Product Price">Product Price</label>
               <input id="product_price" name="product_price[]" placeholder="PRODUCT PRICE" class="form-control input-md"  type="number"
                  data-validation="number"
                  data-validation-allowing="range[1;10000000]">
            </div>
            <div class="col-md-2"></div>
         </div>
         <div id="child-clone"></div>
         <div class="form-row">
            <div class="form-group col-md-12">
               <button id="addproduct" name="addproduct" class="btn btn-primary" onclick="validate()">Add Product</button>
            </div>
         </div>
      </form>
   </body>
</html>
<script>
   $(document).ready(function () {
       var iCnt = 0;
       $('#clone_btn').on('click', function () {
         iCnt++;
         $("#child-clone").append(
         '<div class = "remove">'+
         '<div class="form-row container-fluid" id="icnt">'+
         '<div class="form-group col-md-3">'+
         '<label for="Product Name">Product Name</label>'+
         '<input type = "text" id="product_name" name="product_name[]" placeholder="PRODUCT NAME" class="form-control input-md"  data-validation="length alphanumeric" data-validation-length="2-12" data-validation-error-msg="Product name has to be an alphanumeric value (3-12 chars)"></div>'+
         '<div class="form-group col-md-3">'+
         '<label for="Product Quanity">Product Quantity</label>'+
         '<input type="text" id="product_quantity" name="product_quantity[]" placeholder="PRODUCT QUANTITY" class="form-control input-md"  data-validation="number" data-validation-allowing="range[1;100]"></div>'+
         '<div class="form-group col-md-2">'+
         '<label for="Batch Date">Batch-Date</label>'+
         '<input id="datepicker" name="product_batchdate[]" placeholder="BATCH DATE" data-validation-help="yyyy/mm/dd" data-validation="required"  /></div>'+
         '<div class="form-group col-md-2">'+
         '<label for="Product Price">Product Price</label>'+
         '<input id="product_price" name="product_price[]" placeholder="PRODUCT PRICE" class="form-control input-md"  type="number" data-validation="number" data-validation-allowing="range[1;10000000]"> </div>'+
         '<div class="form-group col-md-2">'+
         '<button type="button" id="'+iCnt+'" class="btn btn-outline-danger">Remove</button></div></div>'
       );
   
       $("form").on("keydown","#datepicker",function(e){
           e.preventDefault();
       });          
       
       $("form").on("focus","#datepicker",function(){
         $(this).datepicker({
         uiLibrary: 'bootstrap4',
         format :'yyyy/mm/dd',
         })          
     });
       $.validate({
           modules : 'date',
       });  
   
     });
   
   });
</script>
<script>
   $('#datepicker').datepicker({
   uiLibrary: 'bootstrap4',
   format :'yyyy/mm/dd'
   });
</script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
   $.validate({
     modules : 'date',    
   });
   
   
</script>
<script>
   //important
   $( "body" ).on("click",".btn-outline-danger", function(){
     $(this).parents(".remove").remove();
     
   });
   $(document).ready(function () {
     //called when key is pressed in textbox
     $("#quantity").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
           //display error message
           $("#errmsg").html("Digits Only").show().fadeOut("slow");
            return false;
       }
      });
   });
   
   $("#datepicker").keydown(function(e){
           e.preventDefault();
   });
   function validate(){
     $('input[id^="product_name"]').each(function() {
       $(this).rules('add', {
           required: true,  // example rule
           // another rule, etc.
       });
   });
   }
</script>
</html>