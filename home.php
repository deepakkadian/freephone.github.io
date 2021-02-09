<?php
require_once('heder.php');

   
    if(@$_GET['cat_id']!='')
    {
    $sql="SELECT * FROM `add_product` where category='".$_GET['cat_id']."'";
    }
    else
    {
	$sql="SELECT * FROM `add_product`";
	}
	$data=mysqli_query($con,$sql);


	


?>




	<div class="col-md-3">
<h1>Items Category</h1>
	<?php

	$cat = mysqli_query($con,"select * from add_cat order by id desc");
	while($cat_list = mysqli_fetch_array($cat))
	{
		?>
	


		<div class="thumnail">

<li class="list-group-item">
		
			<a href="?cat_id=<?=$cat_list['id']?>" style="text-decoration: none; color: black;">
		<img src="upload/<?=$cat_list['catname']?>" style="height: 50px;width:50px; position: absolute; " class="img-responsive" > 
		<h3 style="margin-left: 65px;"><?=ucwords($cat_list['name'])?></h3>
        </a>
        </li>
        
    </div>
    <?php } ?>
    </div>

<?php while ($res=mysqli_fetch_array($data)) {
	
 ?>
 
<div class="form-group col-md-3">
	<form method="post" action="add_cart.php">
		<input type="hidden" name="name" value="<?=$res['name']?>">
		<input type="hidden" name="brand" value="<?=$res['brand']?>">
		<input type="hidden" name="price" value="<?=($res['price']-$res['disc'])?>">
		<input type="hidden" name="product_id" value="<?=$res['id']?>">
		<input type="hidden" name="image" value="<?=$res['image']?>">
	<li class="list-group-item">
				<img src="upload/<?=$res['image']?>" height=100>
				<div class="form-group">
					<br>
					<label>Name =</label>
					<span><?=$res['name']?></span><br>
					<label>Brand =</label>
					<span><?=$res['brand']?></span><br>
				<label>Price =</label>
				<span><?=($res['price']-$res['disc'])?>&nbsp;&nbsp;<del><?=$res['price']?></del></span><br>
				<label>Quantity </label>
				<input type="number" name="qty" min="1" max="9" onkeypress="if(this.value.length==1) return false;" value="1" class="form-control"><br>
				<input type="submit" name="submit" class="btn btn-success" value="add cart">
				
			</div>
		</li>
	</form>
			</div>
	

		<?php } ?>
