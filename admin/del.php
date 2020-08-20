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
<?php
	
	if (isset($_GET['delete_pro'])) {
		if (isset($_POST['yes'])) {
			$delete_id = $_GET['delete_pro'];
			$delete_pro = "DELETE FROM `content` WHERE id='$delete_id'";
			$run_del = mysqli_query($con, $delete_pro);
			if ($run_del) {
				echo "<script>alert ('Post has been deleted')</script>";
				echo "<script>window.open ('home.php?edit_post','_self')</script>";
			}
		}elseif (isset($_POST['no'])) {
			echo "<script>window.open ('home.php?edit_post','_self')</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js" ></script>
    <script type="text/javascript" src="js/bootstrap.min.js" ></script>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title></title>
</head>
<body >
	<div class="container text-center bg-dark">
		<div class="row" style="background-color: white;color: black;text-align: center; margin-top: 100px">
			<div class="col">
				<form action="" method="POST" enctype="multipart/form-data">
					<h3>Are you sure you want to delete this post?</h3>
					<button type="submit" class="btn btn-sm btn-center" name="yes" style=" padding: 20px; ">
						HELL YEAH!!
					</button>
					<button type="submit" class="btn btn-center" name="no" style="padding: 20px; ">
						NAH, MY MISTAKE!!
					</button>
				</form>	
			</div>
		</div>
	</div>
</body>
</html>
<?php } ?>