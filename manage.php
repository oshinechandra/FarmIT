    
<?php
require 'connect.php';
include("head.php"); 


if($_SERVER["REQUEST_METHOD"]==="POST"){



if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
         $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
         if(!in_array($_GET["id"], $item_array_id))
         {
              $count = count($_SESSION["shopping_cart"]);
              $item_array = array(
                   'item_id'               =>     $_GET["id"],
                   'item_name'               =>     $_POST["hidden_name"],
                   'item_price'          =>     $_POST["hidden_price"],
                   'item_quantity'          =>      $_POST["item_quan"],
              );
              $_SESSION["shopping_cart"][$count] = $item_array;
              echo '<script>alert("Item  Added")</script>';

             echo '<script>window.location="customer.php"</script>';
         }
         else
         {
              echo '<script>alert("Item Already Added")</script>';
              echo '<script>window.location="customer.php"</script>';
         }
    }
    else
    {
         $item_array = array(
              'item_id'               =>     $_GET["id"],
              'item_name'               =>     $_POST["hidden_name"],
              'item_price'          =>     $_POST["hidden_price"],
              'item_quantity'          =>     $_POST["item_quan"]

         );
         $_SESSION["shopping_cart"][0] = $item_array;
         echo '<script>window.location="customer.php"</script>';
    }
}
if(isset($_POST['Remove']))

    {
         foreach($_SESSION["shopping_cart"] as $keys => $value)
         {
            if($value['item_name']==$_POST['item_name'])
              {
                   unset($_SESSION["shopping_cart"][$keys]);
                   echo '<script>alert("Item Removed")</script>';
                   echo '<script>window.location="mycart.php"</script>';
              }
         }
    }
    
    if(isset($_POST['Checkout']))
    {
        $invoice=mt_rand();
        $_SESSION['invoice']=$invoice;

        foreach($_SESSION["shopping_cart"] as $keys => $value)
        {
             $p_id=$value["item_id"];
                  $i_name=$value["item_name"];
                  $i_quan=$value["item_quantity"];
                  $i_price=$value["item_price"];
                  $e_email=$_SESSION['e_email'];
                      echo $e_email;
                  //$tot=$i_quan * $i_price;
                    
                    $sql="INSERT INTO c_order (p_name, p_quan, p_price, e_email,dt,invoice) VALUES ('$i_name', '$i_quan', '$i_price',  '$e_email',NOW(),'$invoice')";

          if (mysqli_query($conn,$sql)){
             echo "<script>alert('Inserted Successfully');</script>";
             echo '<script>window.location="updatetot.php"</script>';
           // echo '<script>window.location="mycartfinal.php"</script>';



         }
         else{
             echo "Error:". $sql."<br>". mysqli_error($conn);
         }
          }
        }
        if(isset($_POST['done']))

    {
         foreach($_SESSION["shopping_cart"] as $keys => $value)
         {
                     
                   unset($_SESSION["shopping_cart"][$keys]);
                 
              
         }
         echo '<script>window.location="customer.php"</script>';
    }


    }


?>

