 <?php 
	require "db.php";
	
	if(isset($_GET['id'])){
		$q= mysql_query("delete from categories where id='".$_GET['id']."' ");
		if($q){
			header("location: category.php");
		}
	}
	
	if(isset($_POST['submit'])){
		$category= $_POST['category'];
		
		$qre= mysql_query("insert into categories (name) values ('$category')");
		if($qre){
			echo "added";
		}
	}
	?>
	
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form method="post">
		Category name <br>
		<input type="text" name="category">
		<input type="submit" name="submit" value="save">
	</form>
	<div>
		<table>
			<tr>
				<th>S.no</th>
				<th>Name</th>
			</tr>
		<?php 
			$i=1;
			$q= mysql_query("select * from categories");
			while($r= mysql_fetch_assoc($q)){
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$r['name']."</td>";
				echo "<td><a href='edit_category.php?id=".$r['id']."'>Edit</a></td>";
				echo "<td><a href='category.php?id=".$r['id']."'>Delete</a></td>";
				echo "</tr>";	
				$i++;
			}
		?>
		</table>

	</div>
</body>
</html>	
 