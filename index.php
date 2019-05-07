<?php include("navbar.php"); ?>
<?php include("../style.css");?>
<?php include("display.css") ?>
<?php include("script.php") ?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <head>
        <title>Gallery</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">      
</head>
<body>
 <div class="container">
            <h2>HOTEL IMAGES</h2>	
                    <div class="row">
                    <div class="collapse navbar-collapse" id="navbar1">
                        <ul class="nav navbar-nav navbar-left">
                            <li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['email'] ?></strong></p></li>
                            <br>
                            <li><a href="add_image.php"><strong>Upload Images in Gallery</strong></a></li>
                        </ul>
                    </div>	
                </div>
<?php if(isset($_SESSION['user_id'])){ ?>
<div class="row">
 <?php 
$select_query = "SELECT * FROM gallery WHERE user_id = '".$_SESSION['user_id']."' ";
$res = mysqli_query($connection, $select_query);
if(!$res){
die("Failed Query".mysqli_error($connection));
}
$count = mysqli_num_rows($res);    
while($row = mysqli_fetch_assoc($res)){
$gallery_id = $row['gallery_id'];
$user_id = $row['user_id'];
$image_title = $row['image_title'];
$image_content = $row['image_content'];
$image_name = $row['image_name'];
?>
 <div class="column">
<img src="<?php echo $image_name ?>" <?php echo $user_id ?> style="width: 200px;" onclick="openModal();">
</div>
<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

    <div class="mySlides">
<!--      <div class="numbertext">1 / 4</div>-->
     <img src="<?php echo $image_name ?>" <?php echo $user_id ?> style="width: 100%;" onclick="openModal();">
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
</div>
 <?php }} ?>
</div>
</div>
</body>
</html>
