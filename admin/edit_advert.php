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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js" ></script>
    <title></title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
    <table class="table table-hover table-striped" >
        <thead>
            <tr align="center">
                <td colspan="8"><h2>EDIT ADVERTS</h2></td>
            </tr>
            <tr align="center">
                <th>S/N</th>
                <th>Title</th>
                <th>Image</th>
                <th>Link</th> 
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
           <tr>
                <?php
                    $get_ads = "SELECT * FROM advert";
                    $run_ads = mysqli_query($con, $get_ads);
                    $i = 0;
                    while ($row_ads=mysqli_fetch_array($run_ads) ){
                        $ad_id = $row_ads['id'];
                        $title = $row_ads['title'];
                        $link = $row_ads['link'];
                        $image = $row_ads['image'];
                        $i++;
                ?>
                <td align="center"><?php echo $i; ?></td>
                <td align="center"><?php echo $title; ?></td>
                <td align="center"><img src="advert_images/<?php echo $image; ?>" width="50" height="50"></td>
                <td align="center"><?php echo $link; ?></td>
                <td><a href="home.php?edit_pro=<?php echo $ad_id; ?>">Edit</a></td>
                <td><a href="home.php?delete_pro=<?php echo $ad_id; ?>">Delete</a></td>
            </tr>
        </tbody>
                <?php } ?>
    </table>
</body>
</html>
<?php } ?>