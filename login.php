<?php
require_once('heder.php');
if(@$_SESSION['user']==1)
{
	header('location:home.php');
}
?>

<?php

if (isset($_POST['submit'])){

	$username=$_POST['username'];
	$password=$_POST['password'];

	
	$qry="SELECT * FROM admin WHERE username='$username' AND password='$password'";
   	$run=mysqli_query($con,$qry);
	$row=mysqli_num_rows($run);

	if($row <1){
		echo 'username and password not match';
	}

	else{

		$_SESSION['user']=1;
		header('location:home.php');
	}
    
} 


?>


<form method="post">
      
      <div class="container">

	<div class="form-group">
	<label>Name</label>
<input type="text" name="username" class="form-control">
    </div>

 <div class="form-group">
	<label>password</label>
    <input type="text" name="password" class="form-control">
</div>

<div class="form-group">
	<input type="submit" name="submit" class="btn btn-info">
</div>

</div>

</form>

