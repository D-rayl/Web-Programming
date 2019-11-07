<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../portfolio.css"/>
<title>Portfolio Q.4</title>
</head>
<body>
<h1><br>Portfolio Question 4</h1>
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
<article id="asign">
	<p class="answer">This page randomly selects a quote from a 
				database and posts it to the page with the use of PHP and mySQL.</p>
				<p class="answer"><br><font size="30px" color="red">Quote of Today<br><br></font>
	<?php include 'QuoteOfToday.php';?></p>
</article>

</body>
</html>