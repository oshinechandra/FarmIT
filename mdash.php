<?php
 require 'connect.php';
 session_start();
 if( !$_SESSION['e_email'] ) {
  header('Location:login.php');
  $e_email=$_SESSION['e_email'];
}

 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">FarmIT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home </a>
      </li>
     </ul>
     <div >
     <a href="logout.php" class="btn btn-outline-success" >Logout</a>

     </div>
            </div>
            
</nav> 
<h1>My orders</h1>
<div class="col-lg-8">
                <table class="table">
                <thead class="text-center">
                    <tr>
                    <th scope="col">Serial no</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">quantity</th>
                    <th scope="col">farmer_email</th>
                    <th scope="col">Approve</th>

                    <th scope="col">edit</th>
                    <th scope="col">delete</th>


                    </tr>
                </thead>
                <tbody class="text-center">
                <?php
                $sr=0;
  $branch=$_SESSION['branch'];
  
$sql="SELECT * FROM farm_order WHERE branch='$branch' and ord_status='Waiting'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
        while($prod=mysqli_fetch_assoc($res)){ 
            $sr=$sr+1;
                     ?>
                      
                            <tr>
                                <td><?php echo $sr?></td>
                                <td><?php echo $prod['p_name'];?></td>
                                <td><?php echo $prod['p_price'];?></td>
                                <td><?php echo $prod['p_quan'];?></td>
                                <td><?php echo $prod['e_email'];?></td>
                                <td><a href="approve.php?p_id=<?php echo $prod['p_id']; ?>" class="btn btn-block btn-xs btn-success"> Approve </a></td>
                                <td><a href="prod_update.php?p_id=<?php echo $prod['p_id']; ?>" class="btn btn-block btn-xs btn-warning"> Edit </a></td>
                                <td><a href="delprodman.php?p_id=<?php echo $prod['p_id']; ?>" class="btn btn-block btn-xs btn-danger"> Delete </a></td>
       

                               
                            </tr>
                        

                     <?php          }
}else {
    echo '<h2>NO Available orders<h2>';
}



?>
                </tbody>

                </table>
                </div>

</body>
</html>