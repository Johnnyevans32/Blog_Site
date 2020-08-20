<?php
	$con=mysqli_connect("localhost","root","","news");
	// Check connection
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if (isset($_GET['user_query'])) {
    	$search = $_GET['user_query'];	
	}
	if (!empty($search)) {
		if (mysqli_connect("localhost","root","","news")) {
			$query = "SELECT * FROM `content` WHERE `title` LIKE '".mysqli_real_escape_string($con, $search)."%'";
			$query_run = mysqli_query($con, $query);
			while ($query_row = mysqli_fetch_assoc($query_run)) {
				$id = $query_row['id'];
				$search_title = strtoupper($query_row['title']);
				$search_image = $query_row['image'];
				$search_writer = $query_row['writer'];
				$search_date = $query_row['date'];

				echo "
					<a href='more.php?post=$id'>
						<table class='table table-hover table-light table-striped'>
	              			<tbody style='font-size:10px;'>
								<tr>
									<td><img style='height:30px;width:30px;' src='admin/post_images/$search_image' /></td>
									<td>$search_title<br>$search_date</td>
								</tr>
				            </tbody>
	              		</table>		
					</a>
				";
			}
		}
	}
?>