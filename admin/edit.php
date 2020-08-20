<?php

    if (!isset($_SESSION['username'])) {
        echo "<script>window.open ('login.php?not_admin=You are not an Admin Officer!!','_self')</script>";
    }else{
?>
<?php
	$con = mysqli_connect("localhost","root","","news");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>
<?php
	if (isset($_GET['edit_pro'])) {
		$get_id = $_GET['edit_pro'];
		$get_pro = "SELECT * FROM content WHERE id = $get_id";
		$run_pro = mysqli_query($con, $get_pro);
		$i = 0;
		$row_pro=mysqli_fetch_array($run_pro);
		$id = $row_pro['id'];	
		$title = $row_pro['title'];
		$category = $row_pro['category'];
		$source = $row_pro['source'];
		$writer = $row_pro['writer'];
		$article = $row_pro['article'];
		$image = $row_pro['image'];
    $date = $row_pro['date'];

		$get_cat = "SELECT * FROM categories WHERE `cat_id` = '$category'";

		$run_cat = mysqli_query($con, $get_cat);

		$row_cat = mysqli_fetch_array($run_cat);
		$category_title = $row_cat['cat_title'];
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
		<table  class="table table-hover table-striped">
			<tr align="center">
				<td colspan="8"><h2>EDIT/UPDATE POST</h2></td>
			</tr>
			<tr>
				<td align="right">Post Title</td>
				<td><input type="text" size="50" name="title" value="<?php echo $title; ?>"></td>
			</tr>
			<tr>
				<td align="right">Post Category</td>
				<td>
					<select name="cat"> 
						<option><?php echo $category_title; ?></option>
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
				<td align="right">Post Images</td>
				<td><input type="file" name="image"><img src="post_images/<?php echo $image; ?>" width="50" height="50"></td>
			</tr>
			<tr>
				<td align="right">Post Source</td>
				<td><input type="text" name="source" value="<?php echo $source; ?>"></td>
			</tr>
			<tr>
				<td align="right">Post Writer</td>
				<td><input type="text" size="50" name="writer"  value="<?php echo $writer; ?>"></td>
			</tr>
			<tr>
				<td align="right">Post article</td>
				<td><textarea name="article" cols="20" rows="10"><?php echo $article; ?></textarea></td>
			</tr>
			<tr>
				<td align="right">Post date</td>
				<td><input type="date" size="50" name="date"  value="<?php echo $date; ?>"></td>
			</tr>
			<tr>
				<td colspan="8" align="center">
		           <input type="submit" class="btn btn-hover btn-dark" name="update_now" value="UPDATE">
		        </td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php

	if (isset($_POST['update_now'])) {
		$update_id = $pro_id;
		$post_title = $_POST['title'];
		$post_cat = $_POST['cat'];
		$post_source = $_POST['source'];
		$post_writer = $_POST['writer'];
		$post_article = $_POST['article'];
		$post_image = $_FILES['image']['name'];
		$post_image_tmp = $_FILES['product_image']['tmp_name'];

		move_uploaded_file($post_image_tmp, "admin_images/$product_image");





		$update_post = "";
		$update = mysqli_query($con, $update_post);
		if ($update) {
			echo "<script>alert ('Post has been updated')</script>";
			echo "<script>window.open ('home.php?edit_post','_self')</script>";
		}else{
			echo "<script>alert ('Error Updating!!!')</script>";
		}
	}
?>
<?php } ?>