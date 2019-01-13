<!doctype html>
	<html>
		<head>

		<title>Clicker</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="utf-8">

		<script type="text/javascript">


			function initElement()
			{
			  	var countClick =<?php $nbClick = file_get_contents('data.txt'); echo json_encode($nbClick); ?>;
			  	var p = document.getElementById("clickPhoto");

			 	 p.onclick = function(){
			 	 	countClick = Number(countClick) + 1;
			 	 	alert(countClick);
			 	 	document.getElementById("inputVar").value = countClick;


			 	 };
			};

			</script>
		</head>

	<body onload="initElement();">

		<header>
		<h1>World Clicker</h1>

		<nav>
			<ul>
				<li><a href="">LeaderBoard</a></li>
				<li><a href="">Twitter</a></li>
			</ul>
		</nav>
	</header>

	<section class="clicker">
		
		<img src="click.jpg" id="clickPhoto">

	</section>

	</body>
</html>