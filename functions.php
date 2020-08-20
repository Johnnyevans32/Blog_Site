<?php

$con=mysqli_connect("localhost","root","","news");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function content(){
	if (!isset($_GET['cat'])) {
		global $con;
		$get_pro =  "SELECT * FROM contents ORDER BY RAND() LIMIT 0,6";
		$run_pro = mysqli_query($con, $get_pro);

		while ($row_pro=mysqli_fetch_array($run_pro) ){
			$title = $row_pro['title'];
			$id = $row_pro['id'];

			$writer = $row_pro['writer'];
			$date = $row_pro['date'];
			$image = $row_pro['image'];
			echo "
				
			";
		}	
	}	
}
function getcats(){
	global $con;

	$get_cats = "SELECT * FROM categories";
	$run_cats = mysqli_query($con, $get_cats);
	while ($row_cats=mysqli_fetch_array($run_cats) ){
		
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
		echo "<li class='nav-item'><a href='home.php?cat=$cat_id' class='nav-link'>$cat_title</a></li>";

	}
}
function getsidepost(){
	if (!isset($_GET['cat'])) {
		global $con;
		$get_post =  "SELECT * FROM content LIMIT 0,6";
		$run_post = mysqli_query($con, $get_post);

		while ($row_pro=mysqli_fetch_array($run_post) ){
			$post_title = $row_pro['title'];
			$writer = $row_pro['writer'];
			$date = $row_pro['date'];
			$id = $row_pro['id'];
			$post_source = $row_pro['source'];
			$post_image = $row_pro['image'];
			echo "
				<a href='news.php?full=$id' style='text-decoration:none;'><div class='row text-left' style='padding:0;'>
		           <div class='col-3'>
		           		<img src=admin/'post_images/$post_image' width='60' height='60'>
		           </div>
		           <div class='col-9'>
		           		<b>$post_title</b><br><b>By <h class='text-success'>$writer</h></b>/ $date
		           </div>
		        </div></a><br>
			";
		}	
	}	
}

#search


	
#end

#search_query

	function result(){
		if (isset($_GET['search_query'])) {
			$search_query = $_GET['user_query'];
			if (!empty($search_query)) {
				global $con;
				
				$get_pro =  "SELECT * FROM content WHERE title LIKE '%".mysqli_real_escape_string($con, $search_query)."%'";
				$run_pro = mysqli_query($con, $get_pro);
				$count = mysqli_num_rows($run_pro);
				if ($count==0) {
					echo "<h3><strong>Your Search Query Has NO Result!!!</strong></h3>";
				}else{
					while ($row_pro=mysqli_fetch_array($run_pro) ){
						$post_title = $row_pro['title'];
						$id = $row_pro['id'];
						$cat = $row_pro['category'];
						$post_date = $row_pro['date'];
						$post_image = $row_pro['image'];

						$get_catname= "SELECT * FROM categories WHERE cat_id='$cat'";
						$run_catname= mysqli_query($con, $get_catname);
						while ($row_b=mysqli_fetch_array($run_catname)) {
							$catname=$row_b['cat_title'];
						}
						echo "
							<article id='post-95' class='blog-post-wrap feed-item'>
								<div class='blog-post-inner'>
									<div class='blog-post-image'>
										<img src='admin/post_images/$post_image' style='height:300px; width:300px;'>
										<div class='categories-wrap'>
											<ul class='post-categories'>
												<li><a href='#' rel='category tag'>$catname</a></li>
											</ul>			
										</div>
									</div>
									<div class='blog-post-content'>
										<h2>
											<a href='more.php?post=$id'>
												$post_title
											</a>
										</h2>
										<div class='date'>$post_date</div>
									</div>
								</div>
							</article>
						";
					}
				}
			}else{
				echo "<h3><strong>Your Search Query Field is Empty!!</strong></h3>";
			}
		}	
	}
#end

# slide news
	function getfrontslide(){
		if (!isset($_GET['cat'])) {
			global $con;
			$get_post =  "SELECT * FROM content ORDER BY RAND() LIMIT 0,6";
			$run_post = mysqli_query($con, $get_post);

			while ($row_pro=mysqli_fetch_array($run_post) ){
				$post_title = $row_pro['title'];
				$writer = $row_pro['writer'];
				$date = $row_pro['date'];
				$post_source = $row_pro['source'];
				$post_image = $row_pro['image'];
				$cat = $row_pro['category'];
				$article = $row_pro['article'];

				$get_catname= "SELECT * FROM categories WHERE cat_id='$cat'";
				$run_catname= mysqli_query($con, $get_catname);
				while ($row_b=mysqli_fetch_array($run_catname)) {
					$catname=$row_b['cat_title'];
				}
				echo "
				<div class='swiper-slide main-slide'>
					<div class='main-slide-top'>
						<a href='#' title='$post_title'>
							<span class='slide-thumbnail'>
								<img width='1400' height='935' src='admin/post_images/$post_image' class='attachment-full size-full wp-post-image' alt='' srcset='' sizes='(max-width: 1400px) 100vw, 1400px' />
							</span>
						</a>
						<div class='categories-wrap'>
							<ul class='post-categories'>
								<li><a href='#' rel='category tag'>$catname</a></li>
							</ul>							
						</div>
					</div>
					<div class='main-slide-content'>
						<h3>
							<a href='#' title='$post_title'>$post_title</a>
						</h3>
						<div class='main-slide-date'>$date</div>
					</div>
				</div>
				" ;
			}	
		}	
	}
#end

# recent news
	function getfrontpost(){
		if (!isset($_GET['cat'])) {
			global $con;
			$get_post =  "SELECT * FROM content  ORDER BY `content`.`id` DESC LIMIT 0,6";
			$run_post = mysqli_query($con, $get_post);

			while ($row_pro=mysqli_fetch_array($run_post) ){
				$id = $row_pro['id'];
				$post_title = $row_pro['title'];
				$writer = $row_pro['writer'];
				$date = $row_pro['date'];
				$post_source = $row_pro['source'];
				$post_image = $row_pro['image'];
				$cat = $row_pro['category'];
				$article = $row_pro['article'];

				$get_catname= "SELECT * FROM categories WHERE cat_id='$cat'";
				$run_catname= mysqli_query($con, $get_catname);
				while ($row_b=mysqli_fetch_array($run_catname)) {
					$cat_id=$row_b['cat_id'];
					$catname=$row_b['cat_title'];
				}
				echo "
				<article id='post-95' class='blog-post-wrap feed-item'>
					<div class='blog-post-inner'>
						<div class='blog-post-image'>
							<img src='admin/post_images/$post_image' style='height:300px; width:300px;'>
							<div class='categories-wrap'>
								<ul class='post-categories'>
									<li><a href='#' rel='category tag'>$catname</a></li>
								</ul>			
							</div>
						</div>
						<div class='blog-post-content'>
							<h2>
								<a href='more.php?post=$id'>
									$post_title
								</a>
							</h2>
							<div class='date'>$date</div>
						</div>
					</div>
				</article>
				" ;
			}	
		}	
	}
#end

#single post
	function getpost(){
		if (isset($_GET['post'])) {
			global $con;
			$id=$_GET['post'];
			$get_post =  "SELECT * FROM content WHERE id = $id";
			$run_post = mysqli_query($con, $get_post);

			while ($row_pro=mysqli_fetch_array($run_post) ){

				$post_title = $row_pro['title'];
				$writer = $row_pro['writer'];
				$date = $row_pro['date'];
				$post_source = $row_pro['source'];
				$post_image = $row_pro['image'];
				$cat = $row_pro['category'];
				$article = $row_pro['article'];

				$get_catname= "SELECT * FROM categories WHERE cat_id='$cat'";
				$run_catname= mysqli_query($con, $get_catname);
				while ($row_b=mysqli_fetch_array($run_catname)) {
					$cat_id=$row_b['cat_id'];
					$catname=$row_b['cat_title'];
				}
				echo "
					<div class='main-slider-wrap' style='color:white;'>
						<div class='blog-post-image'>
							<img src='admin/post_images/$post_image' style='height:500px; width:100%;'>
							<div class='categories-wrap'>
								<ul class='post-categories'>
									<li><a rel='category tag'>$catname</a></li>
								</ul>			
							</div>
						</div>
						<p style='color:red;'>Source: $post_source/ Written by:</b> <i>$writer</i><br> $date</p>
						<p>$article</p>
					</div>
				" ;
			}		
		}
	}
#end

#related news
function getrelated(){
	if (isset($_GET['post'])) {
		global $con;
		$id=$_GET['post'];
		$get_post =  "SELECT category FROM content WHERE id = $id";
		$run_post = mysqli_query($con, $get_post);

		while ($row_p=mysqli_fetch_array($run_post) ){
			$cat_id=$row_p['category'];
		}
		$get_catname= "SELECT * FROM content WHERE category = '$cat_id'";
		$run_catname= mysqli_query($con, $get_catname);
		while ($row_pro=mysqli_fetch_array($run_catname)) {
			$id = $row_pro['id'];
			$post_title = $row_pro['title'];
			$writer = $row_pro['writer'];
			$date = $row_pro['date'];
			$post_source = $row_pro['source'];
			$post_image = $row_pro['image'];
			$cat = $row_pro['category'];
			$article = $row_pro['article'];
			echo "
			<article id='post-95' class='blog-post-wrap feed-item'>
				<div class='blog-post-inner'>
					<div class='blog-post-image'>
						<img src='admin/post_images/$post_image' style='height:300px; width:300px;'/>
					</div>
					<div class='blog-post-content'>
						<h2>
							<a href='more.php?post=$id' title='Fashion Models And the World They Live In &#8211; Interview'>$post_title</a>
						</h2>
						<div class='date'>$date </div>
					</div>
				</div>
			</article>
			" ;
		}
		
	}	
}
#end

function getfront(){
	if (isset($_GET['full'])) {
		global $con;
		$post_id = $_GET['full'];
		$get_post =  "SELECT * FROM content  WHERE id='$post_id'";
		$run_post = mysqli_query($con, $get_post);

		while ($row_pro=mysqli_fetch_array($run_post) ){
			
			$post_title = $row_pro['title'];
			$writer = $row_pro['writer'];
			$date = $row_pro['date'];
			$post_source = $row_pro['source'];
			$post_image = $row_pro['image'];
			$cat = $row_pro['category'];
			$article = $row_pro['article'];
			echo "
				<div class='row' style='padding:0;'>
		           <div class='col-12' style='padding:0;'>
		           		<img src='admin/post_images/$post_image' height='250' style='width:100%;'>
		           </div>
		           <div class='col-12'>
		           		<h2>$post_title</h2>
		           		<b>By <h class='text-success'>$writer</h></b>/<b>Date</b>: $date /Source: $post_source /Categories:$cat
		           </div>
		           <div class='col-12'>
		           		<p><i>$article</i></p>
		           </div>
		        </div><br>
			";
		}	
	}	
}

#categories  news
	function getcatbus(){

		if (!isset($_GET['cat'])) {
			global $con;
			$get_post =  "SELECT * FROM content WHERE category = 6 ORDER BY `content`.`id` DESC LIMIT 0,6";
			$run_post = mysqli_query($con, $get_post);

			while ($row_pro=mysqli_fetch_array($run_post) ){
				$id = $row_pro['id'];
				$post_title = $row_pro['title'];
				$writer = $row_pro['writer'];
				$date = $row_pro['date'];
				$post_source = $row_pro['source'];
				$post_image = $row_pro['image'];
				$cat = $row_pro['category'];
				$article = $row_pro['article'];

				$get_catname= "SELECT * FROM categories WHERE cat_id='$cat'";
				$run_catname= mysqli_query($con, $get_catname);
				while ($row_b=mysqli_fetch_array($run_catname)) {
					$catname=$row_b['cat_title'];
				}
				echo "
					<ul>
						<li>
							<a href='more.php?post=$id'>
								<div class='row p-0'>
									<div class='col'>
										<img style='height:100px!important; width:100px!important;' src='admin/post_images/$post_image' />
									</div>
									<div class='col'>										
										<span class='rpwwt-post-title'>$post_title</span>
										<div class='rpwwt-post-author'>By $writer</div>
										<div class='rpwwt-post-date'>$date</div>
									</div>
								</div>
							</a>
						</li>
					</ul>
				" ;
			}		
		}
	}

	function getcatball(){

		if (!isset($_GET['cat'])) {
			global $con;
			$get_post =  "SELECT * FROM content WHERE category = 5 ORDER BY `content`.`id` DESC LIMIT 0,6";
			$run_post = mysqli_query($con, $get_post);

			while ($row_pro=mysqli_fetch_array($run_post) ){
				$id = $row_pro['id'];
				$post_title = $row_pro['title'];
				$writer = $row_pro['writer'];
				$date = $row_pro['date'];
				$post_source = $row_pro['source'];
				$post_image = $row_pro['image'];
				$cat = $row_pro['category'];
				$article = $row_pro['article'];

				$get_catname= "SELECT * FROM categories WHERE cat_id='$cat'";
				$run_catname= mysqli_query($con, $get_catname);
				while ($row_b=mysqli_fetch_array($run_catname)) {
					$catname=$row_b['cat_title'];
				}
				echo "
					<ul>
						<li>
							<a href='more.php?post=$id'>
								<div class='row p-0'>
									<div class='col'>
										<img style='height:100px!important; width:100px!important;' src='admin/post_images/$post_image' />
									</div>
									<div class='col'>										
										<span class='rpwwt-post-title'>$post_title</span>
										<div class='rpwwt-post-author'>By $writer</div>
										<div class='rpwwt-post-date'>$date</div>
									</div>
								</div>
							</a>
						</li>
					</ul>
				" ;
			}		
		}
	}

	function getcatent(){

		if (!isset($_GET['cat'])) {
			global $con;
			$get_post =  "SELECT * FROM content WHERE category = 4 ORDER BY `content`.`id` DESC LIMIT 0,6";
			$run_post = mysqli_query($con, $get_post);

			while ($row_pro=mysqli_fetch_array($run_post) ){
				$id = $row_pro['id'];
				$post_title = $row_pro['title'];
				$writer = $row_pro['writer'];
				$date = $row_pro['date'];
				$post_source = $row_pro['source'];
				$post_image = $row_pro['image'];
				$cat = $row_pro['category'];
				$article = $row_pro['article'];

				$get_catname= "SELECT * FROM categories WHERE cat_id='$cat'";
				$run_catname= mysqli_query($con, $get_catname);
				while ($row_b=mysqli_fetch_array($run_catname)) {
					$catname=$row_b['cat_title'];
				}
				echo "
					<ul>
						<li>
							<a href='more.php?post=$id'>
								<div class='row p-0'>
									<div class='col'>
										<img style='height:100px!important; width:100px!important;' src='admin/post_images/$post_image' />
									</div>
									<div class='col'>										
										<span class='rpwwt-post-title'>$post_title</span>
										<div class='rpwwt-post-author'>By $writer</div>
										<div class='rpwwt-post-date'>$date</div>
									</div>
								</div>
							</a>
						</li>
					</ul>
				" ;
			}		
		}
	}

	function getcattech(){

		if (!isset($_GET['cat'])) {
			global $con;
			$get_post =  "SELECT * FROM content WHERE category = 3 ORDER BY `content`.`id` DESC LIMIT 0,6";
			$run_post = mysqli_query($con, $get_post);

			while ($row_pro=mysqli_fetch_array($run_post) ){
				$id = $row_pro['id'];
				$post_title = $row_pro['title'];
				$writer = $row_pro['writer'];
				$date = $row_pro['date'];
				$post_source = $row_pro['source'];
				$post_image = $row_pro['image'];
				$cat = $row_pro['category'];
				$article = $row_pro['article'];

				$get_catname= "SELECT * FROM categories WHERE cat_id='$cat'";
				$run_catname= mysqli_query($con, $get_catname);
				while ($row_b=mysqli_fetch_array($run_catname)) {
					$catname=$row_b['cat_title'];
				}
				echo "
					<ul>
						<li>
							<a href='more.php?post=$id'>
								<div class='row p-0'>
									<div class='col'>
										<img style='height:100px!important; width:100px!important;' src='admin/post_images/$post_image' />
									</div>
									<div class='col'>										
										<span class='rpwwt-post-title'>$post_title</span>
										<div class='rpwwt-post-author'>By $writer</div>
										<div class='rpwwt-post-date'>$date</div>
									</div>
								</div>
							</a>
						</li>
					</ul>
				" ;
			}		
		}
	}

	function getcatsport(){

		if (!isset($_GET['cat'])) {
			global $con;
			$get_post =  "SELECT * FROM content WHERE category = 1 ORDER BY `content`.`id` DESC LIMIT 0,6";
			$run_post = mysqli_query($con, $get_post);

			while ($row_pro=mysqli_fetch_array($run_post) ){
				$id = $row_pro['id'];
				$post_title = $row_pro['title'];
				$writer = $row_pro['writer'];
				$date = $row_pro['date'];
				$post_source = $row_pro['source'];
				$post_image = $row_pro['image'];
				$cat = $row_pro['category'];
				$article = $row_pro['article'];

				$get_catname= "SELECT * FROM categories WHERE cat_id='$cat'";
				$run_catname= mysqli_query($con, $get_catname);
				while ($row_b=mysqli_fetch_array($run_catname)) {
					$catname=$row_b['cat_title'];
				}
				echo "
					<ul>
						<li>
							<a href='more.php?post=$id'>
								<div class='row p-0'>
									<div class='col'>
										<img style='height:100px!important; width:100px!important;' src='admin/post_images/$post_image' />
									</div>
									<div class='col'>										
										<span class='rpwwt-post-title'>$post_title</span>
										<div class='rpwwt-post-author'>By $writer</div>
										<div class='rpwwt-post-date'>$date</div>
									</div>
								</div>
							</a>
						</li>
					</ul>
				" ;
			}		
		}
	}

	function getcatworld(){

		if (!isset($_GET['cat'])) {
			global $con;
			$get_post =  "SELECT * FROM content WHERE category = 2 ORDER BY `content`.`id` DESC LIMIT 0,6";
			$run_post = mysqli_query($con, $get_post);

			while ($row_pro=mysqli_fetch_array($run_post) ){
				$id = $row_pro['id'];
				$post_title = $row_pro['title'];
				$writer = $row_pro['writer'];
				$date = $row_pro['date'];
				$post_source = $row_pro['source'];
				$post_image = $row_pro['image'];
				$cat = $row_pro['category'];
				$article = $row_pro['article'];

				$get_catname= "SELECT * FROM categories WHERE cat_id='$cat'";
				$run_catname= mysqli_query($con, $get_catname);
				while ($row_b=mysqli_fetch_array($run_catname)) {
					$catname=$row_b['cat_title'];
				}
				echo "
					<ul>
						<li>
							<a href='more.php?post=$id'>
								<div class='row p-0'>
									<div class='col'>
										<img style='height:100px!important; width:100px!important;' src='admin/post_images/$post_image' />
									</div>
									<div class='col'>										
										<span class='rpwwt-post-title'>$post_title</span>
										<div class='rpwwt-post-author'>By $writer</div>
										<div class='rpwwt-post-date'>$date</div>
									</div>
								</div>
							</a>
						</li>
					</ul>
				" ;
			}		
		}
	}
#end

#advert placement
function getadvert(){

	
}
#end

?>
