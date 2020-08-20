<?php

    if (!isset($_SESSION['username'])) {
        echo "<script>window.open ('login.php?not_admin=You are not an Admin Officer!!','_self')</script>";
    }else{
?>
<?php
$con=mysqli_connect("localhost","root","","news");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

	
?>
<!DOCTYPE html>
<html>
<head>

	<title></title>
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<table  class="table table-hover table-striped" >
			<tr align="center">
				<td colspan="8"><h2>INSERT NEW POST</h2></td>
			</tr>
			<tr>
				<td align="right">Title</td>
				<td><input type="text" size="50" name="title"></td>
			</tr>
			<tr>
				<td align="right">Category</td>
				<td>
					<select name="cat"> 
						<option>Select a  Category</option>
						<?php
							$get_cats = "SELECT * FROM categories";
							$run_cats = mysqli_query($con, $get_cats);
							while ($row_cats=mysqli_fetch_array($run_cats) ){
								
								$cat_id = $row_cats['cat_id'];
								$cat_title = $row_cats['cat_title'];
								echo "<option value='$cat_id'>$cat_title</option>";

							} 
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Image</td>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<td align="right">Source</td>
				<td><input type="text" name="source"></td>
			</tr>
			<tr>
				<td align="right">Writer</td>
				<td><input type="text" size="50" name="writer"></td>
			</tr>
			<tr>
				<td align="right">Article</td>
				<td><textarea name="article" cols="20" rows="10"></textarea></td>
			</tr>
			<tr>
				<td align="right">Date</td>
				<td><input type="date" size="50" name="date"></td>
			</tr>
			<tr>
				<td colspan="8" align="center"><input type="submit" class="btn btn-dark" name="insert_now" value="INSERT"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php

	if (isset($_POST['insert_now'])) {
		$title = $_POST['title'];
		$cat = $_POST['cat'];
		$source = $_POST['source'];
		$writer = $_POST['writer'];
		$article = $_POST['article'];
		$date = $_POST['date'];
		$image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];

		move_uploaded_file($image_tmp, "post_images/$image");

		$insert_product = "INSERT INTO `content`(`title`, `image`, `category`, `source`, `writer`, `article`, `date`) VALUES ('$title','$image','$cat','$source','$writer','$article','$date')";
		$insert_pro = mysqli_query($con, $insert_product);
		if ($insert_pro) {
			echo "<script>alert ('Post has been inserted')</script>";
		}else{
			echo "bad";
		}
	}
?>
<?php } ?>