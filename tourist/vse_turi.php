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

	<?php require_once "block/main_header.php" ?>

	<div class="block-tour">
		<div id="tour_heading">
			<h2>Спланируйте свое путешествие</h2>
			<center><a href="#">Показать все туры</a></center>
		</div>
		<?php
		$num = 1;
		$page = (int)$_GET['page'];
		$count = mysqli_query($link,"SELECT COUNT(*) FROM tour_table");
		$temp = mysqli_fetch_array($count);
		if($temp[0] > 0){
			$tempcount = $temp[0];
			$total = (($tempcount - 1) / $num) + 1;
			$total = intval($total);

			$page = intval($page);

			if(empty($page) or $page < 0) $page = 1;

			if($page > $total) $page = $total;

			$start = $page * $num - $num;

			$query_start_num = " LIMIT $start, $num";

			

		}




		$query ="SELECT * FROM tour_table $query_start_num";
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
				<a href="#">Book Now</a>
			</div>
			<div class="clear"></div>
		</div> ';
    }
    while($row = mysqli_fetch_array($result));
    	
	}
	$page_prev = "";
	$page_next = "";
	
	if($page != 1) {$page_prev = '<li><a class="page-prev" href="vse_turi.php?page='.($page - 1).'">prev</a></li>';}
	if($page != $total) {$page_next = '<li><a class="page_next" href="vse_turi.php?page='.($page + 1).'">next</a></li>';}
	
	
	if($total > 1){

		echo '
		<div class="page_nav">
		<ul>
		';
		echo $page_prev;

		for ($i=0; $i < $tempcount ; $i++) { 
			$page = $i; 
			echo '<li><a class="normal" href="vse_turi.php?page='.($page + 1).'"';
			if($page == $i + 1) echo "style='color:red'";
			echo '>'.($page + 1).'</a></li>';
			
			
			
			
			
}
	echo $page_next;

		echo '
		</ul>
		</div>
		';
		

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