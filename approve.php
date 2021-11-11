<?php
 require 'connect.php';
 session_start();
 $p_id=$_GET['p_id'];
$sql="SELECT * FROM farm_order WHERE p_id='$p_id'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
        while($prod=mysqli_fetch_assoc($res)){ 

$prod_name=$prod['p_name'];
$prod_price=$prod['p_price']+10;
$prod_type=$prod['p_type'];
$new_quan=$prod['p_quan'];
$st="SELECT * FROM products ";
$res=mysqli_query($conn,$st);
if(mysqli_num_rows($res)>0){
        while($sk=mysqli_fetch_assoc($res)){ 
            if($prod['p_name']!=$sk['prod_name']){

$query="INSERT INTO products VALUES(null,'$prod_name','$prod_price','$new_quan','$prod_type')";
            }
            else{
                

                
                $old_quan=$sk['prod_quan'];
                $prod_quan=$new_quan+$old_quan;
                $query="UPDATE `products` SET `prod_quan` = '$prod_quan' WHERE `products`.`prod_name` = '$prod_name'";
  
            
                  }
    }
}


if (mysqli_query($conn,$query)){
    $sql="UPDATE `farm_order` SET `ord_status` = 'Appoved' WHERE `farm_order`.`p_id` = '$p_id'";

    if (mysqli_query($conn,$sql)){
        echo "<script>alert('Product approved Successfully');
        window.location.href='mdash.php';
        </script>";
      
        
    }  
    else{
        echo "Error:". $sql."<br>". mysqli_error($conn);
    }


    //echo "<script>alert('Products approved Successfully');                
   // window.location.href='mdash.php';
    //</script>";
    
}  
else{
    echo "Error:". $query."<br>". mysqli_error($conn);
}

        }
    }



 ?>