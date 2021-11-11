<?php
require 'connect.php';
session_start();

if( !$_SESSION['e_email'] ) {
  header('Location:login.php');
  $e_email=$_SESSION['e_email'];

}
$e_email= $_SESSION['e_email'];
         $sql="SELECT * FROM u_list WHERE e_email='$e_email'";
     $res=mysqli_query($conn,$sql);
      if(mysqli_num_rows($res)>0){
          while($user=mysqli_fetch_assoc($res)){
            if($e_email== $user['e_email']){
            $e_fname=$user['e_fname'];
            $e_lname=$user['e_lname'];

            $_SESSION['e_email']=$e_email;
          }
        }
      }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Feedback</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <!--Bootstrap cdn script-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- css -->
        <link rel="stylesheet" href="css/feedback.css">
        <!--link for glyphicons-->
        <script src="https://kit.fontawesome.com/b2cafe6aba.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- nav -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Farm<strong id="IT">IT</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="fdash.php"><?php echo $e_fname; ?>  <?php echo $e_lname; ?><span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Feedback</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="fdash.php#contact">Contact us</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
      </nav>
<!-- navbar ends -->
<div class="login-box">
  <h1>Feedback</h1>
  <form action="" method="POST">
  
  <div class="textbox">
  <input class="firstname" type="text" placeholder="Feedback message" name="f_msg">

  <!--<textarea rows = "3" cols = "50" name = "f_msg">write here...</textarea>-->
  </div>
  <div class="form-group">
  <input type="submit" class="btn" name="e_add" value="Submit">

                           <!-- <a href="customer.php" class="btn btn-info btn-sm" name="add">Submit</a>-->

</div>
</div>
</div>
</form>
<?php
if ( isset($_POST['e_add']) ) {
  $e_email=$_SESSION['e_email'];
//$e_role='Customer';
$f_msg=$_POST['f_msg'];
if(empty($f_msg))
{
 echo "<script>alert('Feedback message cant be blank');</script>";

}
//$sql="INSERT INTO feedback (f_msg, e_role, e_email) VALUES ('$msg', '$e_role','$e_email')";
$sql="INSERT INTO feedback (f_id, f_msg, e_role, e_email) VALUES (NULL, '$f_msg', 'Farmer', '$e_email')";

            if (mysqli_query($conn,$sql)){
                echo "<script>alert('Feedback Submitted Successfully');</script>";
                echo '<script>window.location="fdash.php"</script>';

            }
            else{
                echo "Error:". $sql."<br>". mysqli_error($conn);
            }


}?>

  </body>
</html>
