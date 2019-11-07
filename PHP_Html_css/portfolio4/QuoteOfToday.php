<!DOCTYPE php>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "quote_db";
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	if(mysqli_connect_errno()){
		die("Connection failure");
	}
	$pick = rand(1,10);
	$sql = "Select quote, said From quote_table WHERE quoteID = $pick;";
	if ($result = mysqli_query($conn,$sql)) {
			
		$record = mysqli_fetch_row($result); 
			echo "$record[0]<br><br>";
			echo "-$record[1]";
		mysqli_free_result($result);
	}
	mysqli_close($conn);
?>