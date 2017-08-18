<?php
require_once "include/db_connect.php";
require_once "functions/functions.php";
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

	<!-- Slide Show -->
	<div class="fotorama">
  <img src="upload_images/gandzasar_1.jpg">
  <img src="images/taraz_2.jpg">
  <img src="images/food-and-wine.jpg">
  <img src="6-lo.jpg">
  <img src="5-lo.jpg">
</div>




	<!--<div id="book">
		<form method="post">
			<div class="book_heading">
				<div class="close_btn">
					<img src="images/close.png" style="width:25px; height:25px"/>
				</div>
			<h2>Tour To Armenia</h2>
		</div>
		<div class="other">
			<input type="text" name="name" placeholder="Your Name"/>
			<br/>
			<input type="text" name="email" placeholder="Email" />
			<br/>
			<input type="text" name="phone" placeholder="Phone" />
			<br/>
		</div>
		 <div>
            <textarea placeholder="Введите само сообшение" ></textarea>
        </div>
			<input type="submit" value="send" /><br>
		</form>

	</div>-->





<div id="book">
				  
		<form method="post" action="feedback.php">
		<div class="dm-table">
			<div clas="dm-cell">
		<div class="dm-modal">
			<div class="close_btn">
					<img src="images/close.png" style="width:25px; height:25px"/>
				</div>
			<h2>Tour To Armenia</h2>
			<input type="text" name="name" placeholder="Your Name"/>
			<br/>
			<input type="text" name="email" placeholder="Email" />
			<br/>
			<input type="text" name="phone" placeholder="Phone" />
			<br/>
            <textarea id="message" name="message" placeholder="Введите само сообшение" ></textarea>
			<input type="submit" value="send" /><br>
		</div>
	</div>
	</div>
</form>
		

	</div>

	<script>
	$(document).ready(function(){
		$(".book_now").click(function(){
			$("#book").show();
		});
		$(".close_btn").click(function(){
			$("#book").hide();
		});
	});
	</script>













	<div class="block-tour">
		<div id="tour_heading">
			<h2>Спланируйте свое путешествие</h2>
			<center><a href="#">Показать все туры</a></center>
		</div>
		<?php
		$query ="SELECT * FROM tour_table ";
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
			<div class="tourer">
			<img src="'.$img_path.'">
			<a href="view_tours.php?id='.$row["id"].'"><h2>'.$row["title"].'</h2></a>
			<p>'.$row["mini_description"].'</p>
			<div class="book_now">
				<a>Book Now</a>
			</div>
			<div class="clear"></div>
		</div> ';
    }
    while($row = mysqli_fetch_array($result));
    	
	}
	mysqli_close($link);
		?> 

	</div>

	<?php require_once "block/footer.php" ?>


<!-- Slider -->
	<script>
	$('.fotorama').fotorama({
  width: '100%',
  maxwidth: '1500px',
  ratio: 16/9,
  allowfullscreen: true,
});
	</script>


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