<?php
 require 'connect.php';
 session_start();
$invoice=$_SESSION['invoice'];
$total=$_GET['total'];
$e_email=$_SESSION['e_email'];

$sql="INSERT INTO orders (invoice, total, e_email) VALUES ('$invoice','$total','$e_email')";

            if (mysqli_query($conn,$sql)){
                echo "<script>alert('order placed Successfully');</script>";?>



                <?php
                //echo '<script>window.location="customer.php"</script>';

            }
            else{
                echo "Error:". $sql."<br>". mysqli_error($conn);
            }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order details</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <!--Bootstrap cdn script-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style media="screen">
    body {
            text-align: center;
            padding: 40px 0;
            background: #EBF0F5;
          }
            h1 {
              color: #88B04B;
              font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
              font-weight: 900;
              font-size: 40px;
              margin-bottom: 10px;
            }
            p {
              color: #404F5E;
              font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
              font-size:20px;
              margin: 0;
            }
          i {
            color: #9ABC66;
            font-size: 100px;
            line-height: 200px;
            margin-left:-15px;
          }
          .card {
            background: white;
            padding: 60px;
            border-radius: 4px;
            box-shadow: 0 2px 3px #C8D0D8;
            display: inline-block;
            margin: 0 auto;
          }
         .btn{
           margin: 15px;
         }

    </style>

</head>
<body>
  <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1>
        <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
        <p> Invoice No. :<?php echo "$invoice" ?></p>
        <p> Order Total :<?php echo "$total" ?></p>

              <form action='manage.php' method='POST'>
                <button name='done' class='btn btn-sm btn-outline-warning'>Back to home</button>
                 
                </form>    
                  </div>




</body>
</html>
