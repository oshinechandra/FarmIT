<?php require 'connect.php';?>

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
          <h2>Enter your Phone</h2>
          <input class="form-control" type="text" placeholder="Phone"name="e_phn">
          <h2>Enter your Email</h2>
          <input class="form-control" type="email"placeholder="Email" name="e_email">
          
          <input type="submit" class="btn btn-success btn-sm" name="new_pass" value="Submit">
                        
      </form>

    </div>
    <?php
    
if(isset($_POST['new_pass'])){
    $e_email=$_POST['e_email'];
    $e_phn=$_POST['e_phn'];
    
    $sql="SELECT * FROM u_list WHERE e_email='$e_email'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
            while($user=mysqli_fetch_assoc($res)){
                if($e_email== $user['e_email'] AND $e_phn==$user['e_phn'] ){
                  $_SESSION['e_email']=$e_email;
                  header('Location:fp.php');
                  
                }
                else
                {
                    echo "<script>alert('Incorrect cretials....Try again');</script>"; 
                }
            }
          
    }else {
        echo "<script>alert('Invalid Login....Try again');</script>";
    }
  }


?>
</body>
</html>