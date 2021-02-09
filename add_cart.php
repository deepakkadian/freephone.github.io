<?php
@ob_start();
require_once('heder.php');


                  
                      @$id=$_GET['delid'];
                     
                        if(@$id!='')
                        {

                          $del=mysqli_query($con,"DELETE FROM `add_cart` WHERE id='$id'");
                          {
                          	 header('location: add_cart.php');
                          }
                          }
                  

if(isset($_POST['submit']))
{
	@extract($_POST);

	/*echo '<pre>';
	print_r($_POST);

	echo '</pre>';
	echo $_POST['price']*$_POST['qty'];
	die;
	*/

    $pro_match=   mysqli_query($con,"select * from add_cart where `product_id`='$product_id' ");
    if(mysqli_num_rows($pro_match)==0)
    {

	$qry="INSERT INTO `add_cart`(`name`, `brand`, `price`, `image`, `qty`,`product_id`,`add_date`) VALUES ('$name','$brand','$price','$image','$qty','$product_id',now())";

	$data=mysqli_query($con,$qry);

	if($data==true)
	{
	
	}

	else{
		echo 'faied';
	}
}
else
{
	$qry = mysqli_query($con,"update add_cart set qty='".$qty."',`add_date`=now() where product_id='".$product_id."'");
}
}

?>

 



<div class="form-group">
	<h1 style="text-align: center;">Your Cart</h1>
</div>
<br>

<?php

$cart = mysqli_query($con,"select * from add_cart order by add_date desc");



	 while($res=mysqli_fetch_array($cart)) {
	
 ?>
 
<div class="form-group col-md-3">
	<li class="list-group-item">
				<img src="upload/<?=$res['image']?>" height=100>
				<div class="form-group">
					<br>
					<label>Name =</label>
					<span><?=$res['name']?></span><br>
					<label>Brand =</label>
					<span><?=$res['brand']?></span><br>
				<label>Price =</label>
				<span><?=($res['price']*$res['qty'])?>&nbsp;&nbsp;(<?=$res['price']?>*<?=$res['qty']?>)</span><br>
				<label>Quantity </label>
				<select name="qty" class="form-control" onchange="window.location.href='update_cart.php?cart_id=<?=$res[0]?>&qty=' + this.value">
				<?php
				for($i=1;$i<10;$i++)
				{
					?>
                    <option <?php if($res['qty']==$i) echo 'selected'; ?>><?=$i?></option>
					<?php
				}
				?></select><br>
				<input type="submit" name="submit" class="btn btn-success" value="add cart">


                 
				<td><a href="?delid=<?=$res['id']?>"><button class="btn btn-danger">Delete</button></a></td>
			</div>
		</li>
	
			</div>
	

		<?php } ?>