<?php require_once('heder.php');
if(@$_SESSION['user']=='')
{
	header('location:login.php');
}
        @$id=$_GET['delid'];
       $qry=mysqli_query($con,"DELETE FROM `add_cat` WHERE id='$id'");
     
     $data=mysqli_query($con,"SELECT * FROM `add_cat`");


 ?>

<div class="container">

	<h1 class="text-center text-info">Category List</h1>

 <div class="pull-right">
 	<a href="add_cat.php" class="btn btn-primary">Add New</a>
 </div>

 <div>
 	<table class="table">
 		<tr>
 			<th>name</th>
 			<th>photo</th>
 			<th>Edit</th>
 			<th>Delete</th>

 		</tr>
         
		<?php while($res = mysqli_fetch_array($data)){?>


 		<tr>
 			<td><?=$res['name']?></td>
 			<td><img src="upload/<?=$res['catname']?>" width="50"></td>
 			<td><a href="update_cat.php?upid=<?=$res['id']?>" class="btn btn-success">Edit</a></td>
 			<td><a href="?delid=<?=$res['id']?>"><button class="btn btn-danger">Delete</button></a></td>
 		</tr>
 		<?php }?>

 	</table>
 </div>


</div>