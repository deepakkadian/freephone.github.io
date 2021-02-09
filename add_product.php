<?php require_once('heder.php') ?>

<?php
include('dbcon.php');

 $cat_data=mysqli_query($con,"SELECT * FROM `add_cat`"); ?>
	
<?php
   
   

if(isset($_POST['submit']))
{
	extract($_POST);
	$imgname=$_FILES['pro_img']['name'];
	$tmpname=$_FILES['pro_img']['tmp_name'];

	move_uploaded_file($tmpname,"upload/$imgname");

	$qry="INSERT INTO `add_product`(`name`, `price`, `stock`, `category`, `brand`, `disc`, `description`, `image`) VALUES ('$name','$price','$stock','$category','$brand','$disc','$description','$imgname')";

	 $run=mysqli_query($con,$qry);
    if($run==true)
		{
          ?>
  			<script>
  				alert('Data inserted successfully');
  				location.href = 'product.php';
  			</script>

          <?php
		} 


}



?>




<div class="container">

		<h1 class="text-center text-info">Add Product</h1>

	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name">
			</div>
			<div class="form-group">
				<label>Price</label>
				<input type="number" class="form-control" name="price">
			</div>
			<div class="form-group">
				<label>stock</label>
				<input type="number" class="form-control" name="stock">
			</div>
			<div class="form-group">
				<label>category</label>
               <select name="category" class="form-control">
               	<?php while($res=mysqli_fetch_array($cat_data)) { ?>
               	<option value="<?=$res['id']?>"><?=$res['name']?></option>
                 <?php } ?>
               </select>

 			</div>
			<div class="form-group">
				<label>Brand</label>
				<input type="text" class="form-control" name="brand">
			</div>
			<div class="form-group">
				<label>discount</label>
				<input type="number" class="form-control" name="disc">
			</div>

			<div class="form-group">
				<label>Image</label>
				<input type="file" class="form-control" name="pro_img">
			</div>
			
			<div class="form-group">
				<label>description</label>
               <textarea name="description" class="form-control"></textarea>
 			</div>

			
			<div class="form-group">
				
				<input type="submit" class="btn btn-primary" name="submit">
			</div>
	</form>
</div>