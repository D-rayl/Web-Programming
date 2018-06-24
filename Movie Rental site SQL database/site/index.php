<!doctype html>
<html>
<head>
<title><?php echo basename(__FILE__, '.php'); ?></title>
<link href="main.css" rel="stylesheet" type="text/css">
</head>
 <?php
	$t = array();
	$f = array();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "smt_rentals";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (mysqli_connect_errno()) {
        die("Connection failure");
    } else {
		$i = 0;
        $res =  $conn->query("SELECT `Title`,`Frequency` FROM `Movie` ORDER BY `Frequency` DESC LIMIT 10;");
		while ($row = $res->fetch_assoc()) {
		   $t[$i] = $row["Title"]." "; 
		   $f[$i] = $row["Frequency"];
		   $i++;
		}
    }
	$conn->close();
 ?> 
<body>
<div class="container">
  <div class="header">
    <?php include_once('include/inc_logo.php'); ?>
  </div>
  <div class="sidebar1">
    <?php
	  include_once('include/inc_nav.php');
	  include_once('include/inc_sidebar.php');
    ?>
  </div>
  <div class="content">
    <h1>SMT Movie Rentals</h1>
<?php
    echo "<img src='images/movieChart.php?one=$f[0]&amp;two=$f[1]&amp;three=$f[2]&amp;
			four=$f[3]&amp;five=$f[4]&amp;six=$f[5]&amp;seven=$f[6]&amp;eight=$f[7]&amp;
			nine=$f[8]&amp;ten=$f[9]'>";
			echo "<br>";
	$a = 1;
	foreach($t as $name) {
		echo $a.".  ".$name."<br>";
		$a++;
	}
?>
  </div>
  <div class="footer">
    <?php include_once('include/inc_footer.php'); ?>
  </div>
</div>
</body>
</html>
