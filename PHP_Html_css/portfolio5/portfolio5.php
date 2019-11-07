<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../portfolio.css"/>
  <title>Portfolio Q.5</title>
</head>
<body>
<h1><br>Portfolio Question 5</h1>
<nav>
	<div class="navBtn">
		<a href="../index.html">Home</a>
	</div>
	<div class="navBtn">
		<a href="../portfolio1.html">Portfolio Question 1</a>
	</div>
	<div class="navBtn">
		<a href="/portfolio2/portfolio2.php">Portfolio Question 2</a>
	</div>
	<div class="navBtn">
		<a href="/portfolio3/portfolio3.php">Portfolio Question 3</a>
	</div>
</nav>
<article id="asign">
<?php
	$value1 = 0;
	$value2 = 0;
	$value3 = 0;
	$value4 = 0;
	$value5 = 0;
	$value6 = 0;
	$value7 = 0;
	$value8 = 0;
	$value9 = 0;
	$value10 = 0;
    
	for ($p = 0; $p < 100; $p++) {
		$r = rand(1, 10);
		switch($r){
			case 1:
				$value1++;
			break;
			case 2:
				$value2++;
			break;
			case 3:
				$value3++;
			break;
			case 4:
				$value4++;
			break;
			case 5:
				$value5++;
			break;
			case 6:
				$value6++;
			break;
			case 7:
				$value7++;
			break;
			case 8:
				$value8++;
			break;
			case 9:
				$value9++;
			break;
			case 10:
				$value10++;
			break;
		}
	}
	echo "<img src='RandomIntegerReport.php?one=$value1&amp;two=$value2&amp;three=$value3&amp;
			four=$value4&amp;five=$value5&amp;six=$value6&amp;seven=$value7&amp;eight=$value8&amp;
			nine=$value9&amp;ten=$value10'>"
?>		
	</article>	
<nav id="navRight">
	<div class="navBtn">
		<a href="/portfolio4/portfolio4.php">Portfolio Question 4</a>
	</div>
	<div class="navBtn">
		<a href="/portfolio5/portfolio5.php">Portfolio Question 5</a>
	</div>
	<div class="navBtn">
		<a href="/portfolio6/portfolio6.php">Portfolio Question 6</a>
	</div>
	<div class="navBtn">
		<a href="../contact.html">Contact</a>
	</div>
</nav>
</body>
</html>