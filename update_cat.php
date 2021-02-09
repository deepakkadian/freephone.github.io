<?php
include('dbcon.php');
require_once('heder.php');

$id=$_GET['upid'];
   $data=mysqli_query($con,"SELECT * FROM `add_cat` WHERE id='$id'");
   $res = mysqli_fetch_array($data);



?>

<?php
   
     
     if(isset($_POST['submit']))
     {
     	$name=$_POST['name'];

     	$id=$_GET['upid'];

       $imgname='';
       if($_FILES['cat_img']['name']!='')
       {
     	$imgname=time().$_FILES['cat_img']['name'];
	    $tmpname=$_FILES['cat_img']['tmp_name'];
        unlink("upload/".$res['catname']);
	    move_uploaded_file($tmpname,"upload/$imgname");
	    
        }
        $query = "UPDATE `add_cat` SET `name`='$name' ";
        if(!empty($imgname))
        {
        	$query.=",catname='".$imgname."' ";
        }
        $query.="WHERE id='$id'";
          
     	$sql=mysqli_query($con,$query);

     		if($sql==true)
     		{
     			?>
     			<script>
     				alert('data update successful');
     				location.href = 'category.php';
     			</script>
     			<?php
     			
     		}

     }
   

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="container">

		<h1 class="text-center text-info">Add Category</h1>

	<form method="post" enctype="multipart/form-data" >
		<div class="form-group">
				<label>Category Name</label>
		
				<input type="text" class="form-control" name="name" value="<?=$res['name']?>">

			
			</div>
			<div class="form-group">
				<label>Category Image</label>
				<input type="file" class="form-control" name="cat_img" id="imgInp">
				<img id="blah" src="#" alt="your image"  style="display: none;height:200px;width:250px;" />
				<?php

				if($_GET['upid']!='' && $res['catname']!='')
				{
					?>
				    <img src="upload/<?=$res['catname']?>" id="cimg" style="height:200px;width:250px;">
				    <?php	
				}
				?>
			</div>
			<div class="form-group">
				
				<input type="submit" class="btn btn-primary" name="submit">
			</div>
	</form>
</div>

<script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  document.getElementById('cimg').style.display="none";
  document.getElementById('blah').style.display="";

  readURL(this);
});

</script>