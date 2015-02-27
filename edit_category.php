 <?php 
	require "db.php";
	if(isset($_POST['submit'])){
		$category= $_POST['category'];
		
		$qre= mysql_query("update categories set name='$category' where id='".$_GET['id']."'");
		if($qre){
			header("location: category.php");
		}
	}
	$q= mysql_query("select * from categories where id='".$_GET['id']."'");
	$r= mysql_fetch_assoc($q);
 ?>
 	<form method="post">
		Category name <br>
		<input type="text" name="category" value="<?= $r['name'] ?>">
		<input type="submit" name="submit" value="update">
	</form>