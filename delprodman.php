<?php 
require 'connect.php';
$id=$_GET['p_id'];
$sql=" DELETE FROM farm_order where p_id='$id' ";

if (mysqli_query($conn,$sql)){
    echo "<script>alert('Product deleted Successfully');</script>";
    header('Location:mdash.php');
    
}  
else{
    echo "Error:". $sql."<br>". mysqli_error($conn);
}
?>