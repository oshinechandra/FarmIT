<?php require 'connect.php';?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>

    <!--Font link-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css">
  </head>
  <body>

    <div class="signupform"><h1>Sign Up Form</h1></div>
    <div class="signup-body">
      <form action="" method="POST">
        <div id="name">
          <h2>Name</h2>
          <input class="firstname" type="text" placeholder="First Name" name="e_fname">

          <input class="lastname" type="text" placeholder="Last Name"name="e_lname">

        </div>
          <h2>Phone</h2>
          <input class="form-control" type="text" placeholder="Phone"name="e_phn">
          <h2>Email</h2>
          <input class="form-control" type="email"placeholder="Email" name="e_email">
          <h2>Password</h2>
          <input class="form-control" type="password"placeholder="Password" name="e_pass"><br />
          <h2>Confirm Password</h2>
          <input type="password" class="form-control" placeholder="Confirm Password" name="e_cpass"><br />
          <div class="form-group">
          <h2>Address</h2>
                             <input type ="text" class="form-control input-sm" name="e_address"required placeholder="Address">
                             </div>


          <h2>Pin Code</h2>
          <input type="text" class="form-control" name="e_pin">

          <h2>Are you a Customer or Seller?</h2><br />
          <input  type="radio" class="radio-btn" name="e_role" value="Customer" aria-label="Customer"><label class="radio-label"for="cust_radio">Customer</label>
          <input  type="radio" class="radio-btn"name="e_role"  value="Farmer" aria-label="Seller"><label class="radio-label" for="seller_radio">Seller</label>
          <h2>Select nearby Branch to register</h2><br />
          <br><input  type="radio" class="radio-btn" name="branch_name" value="Branch-south" aria-label="Branch-south"><label class="radio-label"for="bs_radio">  Branch-south  </label></br>
          <br><input  type="radio" class="radio-btn"name="branch_name"  value="Branch-north" aria-label="Branch-north"><label class="radio-label" for="bn_radio">  Branch-north  </label></br>
          <br><input  type="radio" class="radio-btn" name="branch_name" value="Branch-east" aria-label="Branch-east"><label class="radio-label"for="be_radio">  Branch-east  </label></br>
          <br><input  type="radio" class="radio-btn"name="branch_name"  value="Branch-west" aria-label="Branch-west"><label class="radio-label" for="bw_radio">  Branch-west  </label></br>

          <br> </br>
          <input type="submit" class="btn" name="e_add" value="Register">




      </form>

    </div>
    <?php

if ( isset($_POST['e_add']) ) {
    $e_fname=$_POST['e_fname'];
    $e_lname=$_POST['e_lname'];
    $e_email=$_POST['e_email'];
    $e_phn=$_POST['e_phn'];
    $e_pass=$_POST['e_pass'];
    $e_cpass=$_POST['e_cpass'];
    $e_address=$_POST['e_address'];
    $e_pin=$_POST['e_pin'];
    $e_role=$_POST['e_role'];
    $branch_name=$_POST['branch_name'];
    if(empty($e_fname))
    {
      echo "<script>alert('Please enter your first name'');</script>";

    }
if(empty($e_lname))
{
 echo "<script>alert('Please enter your  last name'');</script>";

}

if(empty($e_email))
{
echo "<script>alert('Please enter your  email');</script>";
}
if(empty($e_phn))
{
echo "<script>alert('Please enter your phone number');</script>";
}
if(empty( $e_pass))
{
echo "<script>alert('Please enter your password');</script>";
}
if(empty( $e_cpass))
{
echo "<script>alert('Please confirm your password');</script>";
}
if(empty($e_address))
{
echo "<script>alert('Please enter your address');</script>";
}
if(empty($e_pin))
{
echo "<script>alert('Please enter pincode');</script>";
}
if(empty($e_role))
{
echo "<script>alert('Please select whether you are customer or seller');</script> ";
}

if(empty($branch))
{
echo "<script>alert('Please select branch to register');</script> ";
}


  if(!preg_match("/[a-zA-Z\S]+$/",$e_fname))
    {
        echo "ONLY STRING";
    }
    if($e_pass!= $e_cpass)
     {
       echo "<script>alert('Password mismatched');</script>";

    }else
    {

        $sql="INSERT INTO u_list (e_fname, e_lname, e_email, e_phn, e_pass, e_address, e_pin, e_role,branch_name) VALUES ('$e_fname','$e_lname','$e_email','$e_phn','$e_pass','$e_address','$e_pin','$e_role','$branch_name')";

            if (mysqli_query($conn,$sql)){
                echo "<script>alert('Registered Successfully');</script>";
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
