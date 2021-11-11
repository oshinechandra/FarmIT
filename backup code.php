<h3 class="head">Order Details</h3>
                <div class="table-responsive">
                     <table class="table table-bordered">
                          <tr>
                               <th width="40%">Item Name</th>
                               <th width="10%">Quantity</th>
                               <th width="20%">Price</th>
                               <th width="15%">Total</th>
                               <th width="5%">Add Product </th>
                               <th width="5%">Delete</th>
                          </tr>
                          <?php
                          if(!empty($_SESSION["shopping_cart"]))
                          {
                               $total = 0;
                               foreach($_SESSION["shopping_cart"] as $keys => $values)
                               {
                          ?>
                          <tr>
                               <td><?php echo $values["item_name"]; ?></td>
                               <td><?php echo $values["item_quantity"]; ?></td>
                               <td>Rs <?php echo $values["item_price"]; ?></td>
                               <td>Rs <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                               <td><a href="fruits.php?action=proceed&id=<?php echo $values["item_id"]; ?>"><span class="text-warning">Confirm</span></a></td>
                               <td><a href="fruits.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                          </tr>
                          <?php
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);


                            }
                          ?>
                          <tr>
                               <td colspan="3" align="right">Total</td>
                               <td align="right">Rs <?php echo number_format($total, 2); ?></td>
                               <td></td>
                          </tr>
                           <?php
                          }

                          ?>





fdash.php


<?php
$sr=0;
$e_email=$_SESSION['e_email'];
$sql="SELECT * FROM farm_order WHERE e_email='$e_email'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
        while($prod=mysqli_fetch_assoc($res)){ 
          $sr=$sr+1;
          ?>

<table class="table">
                <thead class="text-center">
                    <tr>
                    <th scope="col">Serial no</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Details</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                
                      
                            <tr>
                                <td><?php echo $sr?></td>
                                <td><?php echo $prod['p_name'];?></td>
                                <td><a href="details.php?p_id=<?php echo $prod['p_id']; ?>" class="btn btn-block btn-xs btn-info"> Details </a></td>
                                <td><a href="prod_update.php?p_id=<?php echo $prod['p_id']; ?>" class="btn btn-block btn-xs btn-warning"> Edit </a></td>
                                <td><a href="del_prod.php?p_id=<?php echo $prod['p_id']; ?>" class="btn btn-block btn-xs btn-danger"> Delete </a></td>
       
                               
                            </tr>
                        

                     <?php          }
}else {
    echo "NO orders";
}


?>
                </tbody>

                </table>                

                BEGIN
	DECLARE p_p, p_q,tot INTEGER;
    DECLARE prod_cursor CURSOR FOR SELECT p_price,p_quan FROM c_order;
    OPEN prod_cursor;
    FETCH FROM prod_cursor INTO p_p , p_q;
    tot:=p_p * p_q;
     UPDATE c_order SET total=tot;
    CLOSE prod_cursor;
END;