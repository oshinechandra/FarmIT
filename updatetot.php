<?php require 'connect.php';
$sql="CALL `cal_tot`();";
$res=mysqli_query($conn,$sql);

echo '<script>window.location="mycartfinal.php"</script>';
    


?>
