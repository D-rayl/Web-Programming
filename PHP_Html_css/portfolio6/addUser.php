<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../portfolio.css"/>
  <title>Portfolio Q.6</title>
</head>
<body>
<?php
error_reporting(0);
/**
 * Members database
 *
 * PHP version 5
 *
 * @file 
 * @category Method
 * @package  MyPackage
 * @author   DC <daryl@crosbie.com>
 * @license  http://www.dc.org Daryl
 * @link     http://www.dc.com
 * PHP 5
 */
    $name = $email = "";
    $res = "";
    $check = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $name = "Name required";
        $check = false;
    
    } else {
        $name = Test_input($_POST["name"], "name");
        if ($name == "Invalid name") {
            $check = false;
			$res = "User not added";
        }
    
    }
    if (empty($_POST["email"])) {
        $email = "email required";
        $check = false;
    
    } else {
        $email = Test_input($_POST["email"], "email");
        if ($email == "Invalid email") {
            $check = false;
			$res = "User not added";
        }
    
    }
    if ($check) {
        $res = insertMember($name, $email);
    
    }

}
/**
 * Test the users input for correct format
 * 
 * @param string $data the users name or email
 * @param string $type tells whether its the name or email
 *
 * @return string $data the result of the check
 *
 * @access public
 */
function Test_input($data, $type)
{
    if ($type == "name") {
        if (preg_match("/^[A-Z][a-z'-]+/", $data)) {
            return $data;
        
        } else {
            return "Invalid name";
        
        }
    
    } else if ($type == "email") {
        if (preg_match("/^.+@.+\.(com|net|com.au)$/", $data)) {
            return $data;
        
        } else {
            return "Invalid email";
        
        }
    
    }

}
?>
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
    <p id="memTitle">Add User</p>
    <form action="<?php 
        echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <p>Name     : <input type="text" name="name"/></p>
    <P>@ email  : <input type="text" name="email"/></p>
    <button class="bHover" type="submit">Submit</button>
    </form>
<?php
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br><br>";
    echo $res;
?>
</article>
<?php
/**
 * Inserts users to the members table
 * 
 * @param string $name  the user name
 * @param string $email the users email
 *
 * @return string $res  a result whether successful or not
 * 
 * @access public
 */
function insertMember($name, $email)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "membership";
    $sqlDbName = "CREATE DATABASE IF NOT EXISTS membership";
    $sqlTable = "CREATE TABLE IF NOT EXISTS 
    members(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(50),email varchar(100));";
    $conn = mysqli_connect($servername, $username, $password);
    if (mysqli_connect_errno()) {
        die("Connection failure");
    
    }
    if ($conn->query($sqlDbName) === true) {
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if ($conn->query($sqlTable) === true) {
            $stmt = $conn->prepare("INSERT INTO members(name, email) VALUES (?,?)");
            $stmt->bind_param("ss", $name, $email);
            if ($stmt->execute() === true) {
                return $res = "New member added";
            
            } else {
                return $res = "Error adding member";
            
            }
        
        } else {
            return $res = "Error creating table";
        
        }
    
    } else {
        return $res = "Error creating database";
    
    }    
    $stmt->close();
    $conn->close();

}
?>
</body>
</html>
