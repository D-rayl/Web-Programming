<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../portfolio.css"/>
  <title>Portfolio Q.6</title>
</head>
<body>
<h1><br>Membership Management</h1>
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
    <p id="memTitle">Members List</p>
<div id="list">
<?php
error_reporting(0);
/**
 * List all members from the database
 *
 * PHP version 5
 *
 * @file 
 * @category Class
 * @package  MyPackage
 * @author   DC <daryl@crosbie.com>
 * @license  http://www.dc.org Daryl
 * @link     http://www.dc.com
 * PHP 5
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "membership";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    die("Connection failure");
    
} else {
    $sqlList = "SELECT name, email FROM members";
    $res = $conn->query($sqlList);
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            echo "Name: ".$row["name"]."<br>Email: ".$row["email"]."<br><br>";
        }
    } else {
        echo "0 result";
    }            
}
$conn->close();
?>
<div>
</article>
</body>
</html>
