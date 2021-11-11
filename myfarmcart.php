<?php include("headfarm.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
            <h1>MY CART</h1>
            </div>
            <div class="col-lg-8">
                <table class="table">
                <thead class="text-center">
                    <tr>
                    <th scope="col">Serial no</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">quantity</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                <?php
                $total=0;
                if(isset($_SESSION['cart']))
                { 
                    foreach($_SESSION['cart'] as $key=>$value)
                    {  
                       $sr=$key+1;  
                      // $total=$total+$value['prod_price'];
                       echo "
                            <tr>
                                <td>$sr</td>
                                <td>$value[prod_name]</td>
                                <td>$value[prod_price]</td>
                                <td>$value[prod_quan]</td>
                                <td>
                                    <form action='managefarm.php' method='POST'>
                                        <button name='Remove' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                        <input type='hidden' name='prod_name' value='$value[prod_name]'>

                                    </form>
                                </td>
                            </tr>
                        ";
                    }
                }

                ?>
                 
                   
                </tbody>

                </table>
                <form action='managefarm.php' method='POST'>
                <button name='Checkout' class='btn btn-sm btn-outline-warning'>Checkout</button>
                 <input type='hidden' name='item_name' value='$value[item_name]'>
                 
                </form>
            </div>

            <div class="col-lg-4">
               <div class="border bg-light rounded p-4">
                    <h4>Total</h4>
                    <h5 class='text-right'><?php echo $total ?></h5>

                        <a href='order.php?total=<?php echo $total;?>' class="btn btn-primary btn-block">Place Order</a>

                 </div> 
            </div>
        </div>
    </div>
    
</body>
</html>
