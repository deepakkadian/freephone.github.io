<?php

include('dbcon.php');

if($_GET['cart_id']!='' && $_GET['qty']!='')
{
	$sql = mysqli_query($con,"update add_cart set qty='".$_GET['qty']."',`add_date`=now() where id='".$_GET['cart_id']."'");
	header('location:add_cart.php');
}
else
{
	header('location:add_cart.php');
}

?>