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
				<td colspan="8"><h2>INSERT NEW ADVERT</h2></td>
			</tr>
			<tr>
				<td align="right">Title</td>
				<td><input type="text" size="50" name="title"></td>
			</tr>
			<tr>
				<td align="right">Image</td>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<td align="right">Link</td>
				<td><input type="text" name="link"></td>
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
		$link = $_POST['link'];
		$image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];

		move_uploaded_file($image_tmp, "advert_images/$image");

		$insert_advert = "INSERT INTO `advert`(`title`, `image`, `link`) VALUES ('$title','$image','$link')";
		$insert_ad = mysqli_query($con, $insert_advert);
		if ($insert_ad) {
			echo "<script>alert ('Advert has been inserted')</script>";
		}else{
			echo "bad";
		}
	}
?>
<?php } ?>