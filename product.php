<?php
require_once('heder.php');

if(@$_SESSION['user']=='')
{
	header('location:login.php');
}
@$id=$_GET['delid'];
$delpro=mysqli_query($con,"DELETE FROM `add_product` WHERE `id`='$id'");

$data=mysqli_query($con,"SELECT * FROM `add_product`");


?>


<div class="container">

	<h1 class="text-center text-info">product List</h1>

 <div class="pull-right">
 	<a href="add_product.php" class="btn btn-primary">Add New</a>
 </div>

 <div>
 	<table class="table">

 		<tr>
 			<th>Name</th>
 			<th>Price</th>
 			<th>stock</th>
 			<th>Brand</th>
 			<th>Discount</th>
 			<th>Category</th>
 			<th>Image</th>
 			<th>Description</th>
 			<th>Edit</th>
 			<th>Delete</th>
 			
 		</tr>
        
        <?php while($res= mysqli_fetch_array($data)) { 

             $datacat=mysqli_query($con,"SELECT * FROM `add_cat` WHERE id='".$res['category']."'");
   $rescat = mysqli_fetch_array($datacat);


        	?>

 		<tr>
 			<td><?=$res['name']?></td>
 			<td><?=$res['price']?></td>
 			<td><?=$res['stock']?></td>
 			<td><?=$res['brand']?></td>
 			<td><?=$res['disc']?></td>
 			<td><?=$rescat['name']?></td>
 			<td><img src="upload/<?=$res['image']?>" width="50"></td>
 			<td><?=$res['description']?></td>
 			<td><a href="update_product.php?upid=<?=$res['id']?>"><button class="btn btn-success">Edit</button></a></td>
 			<td><a href="?delid=<?=$res['id']?>"><button class="btn btn-danger">Delete</button></a></td>
 		</tr>
 	      <?php }?>
 	</table>
 </div>


</div>

