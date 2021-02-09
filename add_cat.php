<?php require_once('heder.php')
	  
 ?>

<?php
include('dbcon.php');
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$imgname=$_FILES['cat_img']['name'];
	$tmpname=$_FILES['cat_img']['tmp_name'];

	move_uploaded_file($tmpname,"upload/$imgname");
    
    $qry="INSERT INTO `add_cat`(`name`, `catname`) VALUES ('$name','$imgname')";
    $run=mysqli_query($con,$qry);
    if($run==true)
		{
          ?>
  			<script>
  				alert('Data inserted successfully');
  				location.href = 'category.php';
  			</script>

          <?php
		} 


}


?>







<div class="container">

		<h1 class="text-center text-info">Add Category</h1>

	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
				<label>Category Name</label>
				<input type="text" class="form-control" name="name">
			</div>
			<div class="form-group">
				<label>Category Image</label>
				<input type="file" class="form-control" name="cat_img">
			</div>
			<div class="form-group">
				
				<input type="submit" class="btn btn-primary" name="submit">
			</div>
	</form>
</div>