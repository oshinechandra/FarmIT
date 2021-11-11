
<?php
 require 'connect.php';
 include("head.php"); 


?>
<!DOCTYPE html>
 <html>
      <head>
           <title>Fruits and Vegetables</title>
           <!--Bootstrap cdn script-->
           <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
               <!-- css -->
           <style media="screen">
             .header{
               background-color:#639a67;
               padding: 20px;
             }
             .head{
               background-color:#cdd0cb;
               padding: 20px;
             }
           </style>
      </head>
      <body>
           <br />
           <h3 class="header"align="center">Fresh fruits and veggies</h3><br />

           <div class="container" style="width:700px;">
               <div class="row">
                
                <?php
                $query = "SELECT * FROM products where prod_type = 'Fruits And Vegetables' ORDER BY prod_id ASC";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0)
                {
                     while($row = mysqli_fetch_array($result))
                     {
                ?>
                
                <div class="col-lg-3">
                     <form method="POST" action="manage.php?action=add&id=<?php echo $row["prod_id"]; ?>">
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">

                               <h4 class="text-info" ><?php echo $row["prod_name"]; ?></h4>
                               <h4 class="text-danger">Rs <?php echo $row["prod_price"]; ?></h4>

                              <td><input class='text-center' name='item_quan' type='number' value='1'  min='1' max='10'></td>

                               <input type="hidden" name="hidden_name" value="<?php echo $row["prod_name"]; ?>" />
                               <input type="hidden" name="hidden_price" value="<?php echo $row["prod_price"]; ?>" />


                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Select" />
                          </div>
                     </form>
                </div>
                <?php
                     }
                }
                else{
                    echo "NO PRODUCTS AVAILABLE";
                }

                ?>


                <div style="clear:both"></div>
                         <br />


                     </table>

                    </div>
                </div>
           </div>
           <br />
           <td type="text-center"><a class="btn btn-success"href="customer.php#products">Add other items</a></td>

      </body>
 </html>



