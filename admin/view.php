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
                <td colspan="8"><h2>EDIT POST</h2></td>
            </tr>
            <tr align="center">
                <th>S/N</th>
                <th>Title</th>
                <th>Image</th>
                <th>Source</th> 
                <th>Writer</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
           <tr>
                <?php
                    $get_pro = "SELECT * FROM content";
                    $run_pro = mysqli_query($con, $get_pro);
                    $i = 0;
                    while ($row_pro=mysqli_fetch_array($run_pro) ){
                        $post_id = $row_pro['id'];
                        $title = $row_pro['title'];
                        $source = $row_pro['source'];
                        $image = $row_pro['image'];
                        $writer = $row_pro['writer'];
                        $date = $row_pro['date'];
                        $i++;
                ?>
                <td align="center"><?php echo $i; ?></td>
                <td align="center"><?php echo $title; ?></td>
                <td align="center"><img src="post_images/<?php echo $image; ?>" width="50" height="50"></td>
                <td align="center"><?php echo $source; ?></td>
                <td align="center"><?php echo $writer; ?></td>
                <td align="center"><?php echo $date; ?></td>
                <td><a href="home.php?edit_pro=<?php echo $post_id; ?>">Edit</a></td>
                <td><a href="home.php?delete_pro=<?php echo $post_id; ?>">Delete</a></td>
            </tr>
        </tbody>
                <?php } ?>
    </table>
</body>
</html>
<?php } ?>