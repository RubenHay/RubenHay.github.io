<?php
require_once "include/db_connect.php";
require_once "functions/functions.php";
$id = clear_string($_GET["id"]);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Отдых в Армении</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="css/fotorama.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Antic' rel='stylesheet'>
    <script src="js/fotorama.js"></script>
	<link rel="stylesheet" href="css/style.css">
	
</head>
<body>
	<!-- Top Header -->
	<?php require_once "block/top_header.php"; ?>

		<!-- Main Header -->

		<?php require_once "block/main_header.php"; ?>

		<div id="tour_content" >
			<div id="tour_heading">
			<h2>Спланируйте свое путешествие</h2>
			<center><a href="#">Показать все туры</a></center>
		</div>

		<?php
		$query ="SELECT * FROM tour_table WHERE id='$id'";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		$row = mysqli_fetch_array($result);
		if($result)
	{
		do{

			if($row["image"] != "" && file_exists("upload_images/".$row["image"])){
				$img_path = "upload_images/".$row["image"];
			}
			else{
				$img_path = "upload_images/no-image.png";
			}

    	echo '
			<div class="tour_description">
			<div class="tour_images">
			<a class="photo" href="'.$img_path.'"><img class="image" src="'.$img_path.'"></a>
			<a class="photo" href="upload_images/'.$row["image2"].'"><img class="image" src="upload_images/'.$row["image2"].'"></a>
			<a class="photo" href="upload_images/'.$row["image3"].'"><img class="image" src="upload_images/'.$row["image3"].'"></a>
			</div>
			<div class="description_text">
			<p>'.$row["description"].'</p>
			</div>
			</div>
			<div class="book_now_view">
				<center><a href="#">Book Now</a></center>
			</div>
			';
    }
    while($row = mysqli_fetch_array($result));
    	
	}
	mysqli_close($link);
		?> 

		</div>

	<?php require_once "block/footer.php" ?>

		<!-- JQuery -->
		<script>
		$(document).ready(function(){
			$("#menu_show").click(function() {
				if($("#mobile_menu").is(':visible')){
					$("#mobile_menu").hide();
				}
				else{
					$("#mobile_menu").show();
				}
			});
		});
		window.onresize = function(){
			$("#mobile_menu").hide();
		}
		</script>
</body>
</html>
