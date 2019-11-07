<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="../portfolio.css"/>
<title>Portfolio Q.3</title>
</head>
<body>
	<h1><br>Portfolio Question 3</h1>
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
	<h2></br> Enter a five digit number </br></h2>
	<form action="NumberSeparator.php" method="post">
	<p> Numbers : <input type="text" name="nums"/></p>
	<button class="bHover" type="submit">Submit</button>
	</form>
<?php
	if(strlen($_POST['nums']) != 5){
		echo "<script type='text/javascript'>alert('Five digits')</script>";
	}
	else{
		$arr = str_split($_POST['nums']);
		echo '<h2></br> The sum of all numbers </br></h2>';
		$sum = 0;
		foreach($arr as $val){
			$sum +=intval($val);
		}
		    echo "<table cellpadding='15' border='1' align='center'>";
			echo "<tr><th>$arr[0]</th><th>$arr[1]</th><th>$arr[2]</th><th>$arr[3]</th><th>$arr[4]</th>
			<th>=></th><th>$sum</tr>";
	}
?>
</article>
</body>
</html>


	
