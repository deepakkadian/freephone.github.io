<?php
require_once('heder.php');

include('dbcon.php');

$id=$_GET['upid'];
$data=mysqli_query($con,"SELECT * FROM `add_product` WHERE id='$id'");

?>

<?php

 if(isset($_POST['submit']))
     {
     	extract($_POST);

     	$id=$_GET['upid'];

     	 $imgname='';
       if($_FILES['pro_img']['name']!='')
       {
     	$imgname=time().$_FILES['pro_img']['name'];
	    $tmpname=$_FILES['pro_img']['tmp_name'];
        unlink("upload/".$res['catname']);
	    move_uploaded_file($tmpname,"upload/$imgname");
	    
        }
      
     	/*$sql=mysqli_query($con,"UPDATE `add_product` SET `name`='$name',`price`='$price',`stock`='$stock',`brand`='$brand',`disc`='$disc',`description`='$description' WHERE id='$id'");
*/
          
          $query = "UPDATE `add_product` SET `name`='$name',`price`='$price',`stock`='$stock',`brand`='$brand',`disc`='$disc',`description`='$description' ";
        if(!empty($imgname))
        {
        	$query.=",image='".$imgname."' ";
        }
        $query.="WHERE id='$id'";
          
     	$sql=mysqli_query($con,$query);






     		if($sql==true)
     		{
     			?>
     			<script>
     				alert('data update successful');
     				location.href = 'product.php';
     			</script>
     			<?php
     			
     		}

     }

?>






<div class="container">

		<h1 class="text-center text-info">Add Product</h1>

	<form method="post" enctype="multipart/form-data">

		<?php while($res=mysqli_fetch_array($data)) {?>
		
		<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" value="<?=$res['name']?>">
			</div>
			<div class="form-group">
				<label>Price</label>
				<input type="number" class="form-control" name="price" value="<?=$res['price']?>">
			</div>
			<div class="form-group">
				<label>stock</label>
				<input type="number" class="form-control" name="stock" value="<?=$res['stock']?>">
			</div>
			
			<div class="form-group">
				<label>Brand</label>
				<input type="text" class="form-control" name="brand" value="<?=$res['brand']?>">
			</div>
			<div class="form-group">
				<label>discount</label>
				<input type="number" class="form-control" name="disc" value="<?=$res['disc']?>">
			</div>

			<div class="form-group">
				<label>Image</label>
				<input type="file" class="form-control" name="pro_img">
				<img src="upload/<?=$res['image']?>">
			</div>
			
			<div class="form-group">
				<label>description</label>
               <textarea name="description" class="form-control"><?=$res['description']?></textarea>
 			</div>

 		<?php }?>

			
			<div class="form-group">
				
				<input type="submit" class="btn btn-primary" name="submit">
			</div>
	</form>
</div>