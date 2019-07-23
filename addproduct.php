<?php
if(isset($_POST['addproduct'])){

    $product_name=$_POST["product_name"];
    $product_quantity=$_POST["product_quantity"];
    $product_batchDate=$_POST["product_batchdate"];
    $product_price=$_POST["product_price"];
 
    if($product_name =="") {
      $errorMsg=  "error : You did not Enter a Poduct Name.";
      $code= "1" ;
    }
    if($product_quantity == "") {
      $errorMsg=  "error : Please Enter Product Quantity.";
      $code= "2";
    }
    if($product_batchDate == "") {
        $errorMsg=  "error : Please Enter Product BatchDate.";
        $code= "3";
    }
    if($product_price == "") {
        $errorMsg=  "error : Please Enter Product Price.";
        $code= "4";
    }
    else {
        include 'connection.php';
        for($counter = 0; $counter < count($product_name);$counter++){
            $p_name = $product_name[$counter];
            $p_quantity = $product_quantity[$counter];
            $p_price = $product_price[$counter];
            $p_batchDate = $product_batchDate[$counter];
            $insert_query = "INSERT INTO product_listing (p_name,p_quantity,p_price,p_batchdate) VALUES ('$p_name','$p_quantity','$p_price','$p_batchDate')";
            $result = mysqli_query($conn, $insert_query);            
        }
        if($result == "1"){
            header('Location:index.php');
        }
        else{
            echo "Failed";
        }
    
    }

}
?>
