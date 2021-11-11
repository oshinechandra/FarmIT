<?php 
require 'connect.php';
session_start();



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
    <!--Font link-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css">
  </head>
  <body>
    
    <div class="signupform"><h1>Forgot Password</h1></div>
    <div class="signup-body">
    
      <form action="" method="POST">
          <h2>New Password</h2>
          <input class="form-control" type="password" placeholder="new password"name="e_pass">
          <h2>Confirm password</h2>
          <input class="form-control" type="text"placeholder="confirm password" name="e_cpass">
          
          <input type="submit" class="btn btn-success btn-sm" name="new_pass" value="Submit">
                        
      </form>

    </div>
    <?php
if ( isset($_POST['new_pass']) ) {
    $e_pass=$_POST['e_pass'];
    $e_cpass=$_POST['e_cpass'];
    $e_email=$_SESSION['e_email'];
    
    if(empty( $e_pass))
{
echo "<script>alert('Please enter your password');</script>";
}
if(empty( $e_cpass))
{
echo "<script>alert('Please confirm your password');</script>";
}
if($e_pass!= $e_cpass)
{
  echo "<script>alert('Password mismatched');</script>";
   
}else
{
    
    $sql=" UPDATE u_list SET e_pass='$e_pass' where e_email='$e_email'";

       if (mysqli_query($conn,$sql)){
           echo "<script>alert('Password changed Successfully');</script>";
           header('Location:login.php');
           
       }  
       else{
           echo "Error:". $sql."<br>". mysqli_error($conn);
       }
    }
}
?>
</body>
</html>