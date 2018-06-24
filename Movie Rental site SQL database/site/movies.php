<!doctype html>
<html>
<head>
<title><?php
/**
 * Search the database for movies
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
 echo basename(__FILE__, '.php'); 
    ?>
</title>
<link href="main.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
/**
 * Validate input and prepare statement for sql
 */
error_reporting(0);
$title = $genre = $rating = $year = $sqlSelect = $res = "";
$boolT = $boolG = $boolR = $boolY = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["title"])) {
        $boolT = true;
        $title = $_POST["title"];
    }
    if (!empty($_POST["genre"])) {
        $boolG = true;
        $genre = $_POST["genre"];
    }        
    if (!empty($_POST["rating"])) {
        $boolR = true;
        $rating = $_POST["rating"];
    }    
    if (!empty($_POST["year"])) {
        $boolY = true;
        $year = $_POST["year"];
    }
    if (!$boolT && !$boolG && !$boolR && !$boolY) {
        echo "<script type='text/javascript'>
		alert('Enter a title or at least one other field')</script>";
    } 
    if ($boolT) {
        $sqlSelect = "SELECT * FROM movie WHERE Title='$title'";
    } else {
        $sqlSelect = "SELECT * FROM movie WHERE ";
        if ($boolG) {
            $sqlSelect = $sqlSelect."Genre='$genre' ";
        }
        if ($boolR && $boolG) {
            $sqlSelect = $sqlSelect."AND Rating='$rating' ";    
        } else if ($boolR) {
            $sqlSelect = $sqlSelect."Rating='$rating' ";
        }
        if ($boolY && ($boolR || $boolG) ) {
            $sqlSelect = $sqlSelect."AND Year='$year'";
        } else if ($boolY) {
            if ($_POST["yearAfter"] === "after") {
                $sqlSelect = $sqlSelect."Year>='$year'";
            } else {
                $sqlSelect = $sqlSelect."Year<='$year'";
            }
        }
    }
}
?>
<div class="container">
  <div class="header">
    <?php require_once 'include/inc_logo.php'; ?>
  </div>
  <div class="sidebar1">
    <?php
    require_once 'include/inc_nav.php';
    require_once 'include/inc_sidebar.php';
    ?>
  </div>
  <div class="content">
    <h1>Movie Listings</h1>
    <p>Search the database for the movies you wish to watch.</p>
    <form action="<?php 
        echo htmlspecialchars(
            $_SERVER["PHP_SELF"]
        );?>" method="post">
    <p>Title__<input type="text" name="title"/>   
    <button type="submit">Search</button></p>
    <p>Genre_<select type="text" name="genre">
      <option value=""></option>
      <option value="Adventure">Adventure</option>
      <option value="Action/Adventure">Action/Adventure</option>
      <option value="Drama">Drama</option>
      <option value="Family">Family</option>
      <option value="SciFi">SciFi</option>
      <option value="Mystery/Suspense">Mystery/Suspense</option>
      <option value="Comedy">Comedy</option>
      <option value="VAR">VAR</option>
      <option value="Music">Music</option>
      <option value="Animation">Animation</option>
      <option value="Musical">Musical</option>
      <option value="Horror">Horror</option>
      <option value="Documentary">Documentary</option>
      <option value="Western">Western</option>
      <option value="TV Classics">TV Classics</option>
      <option value="Thriller">Thriller</option>
      <option value="Ballet">Ballet</option>
      <option value="Foreign">Foreign</option>
      <option value="Dance / Ballet">Dance / Ballet</option>
      <option value="Opera">Opera</option>
      <option value="Comedy/Drama">Comedy/Drama</option>
      <option value="Action/Comedy">Action/Comedy</option>
      <option value="Fantasy">Fantasy</option>
      <option value="Special Interest">Special Interest</option>
      <option value="Late Night">Late Night</option>
      <option value="Other">Other</option>
      <option value="Anime">Anime</option>
      <option value="War">War</option>
      <option value="Satire">Satire</option>
      <option value="Suspense/Thriller">Suspense/Thriller</option>
    </select>
    </p>
    <p>Rating_<select type="text" name="rating">
      <option value=""></option>
      <option value="R">R</option>
      <option value="NR">NR</option>
      <option value="G">G</option>
      <option value="PG">PG</option>
      <option value="PG-13">PG-13</option>
      <option value="VAR">VAR</option>
      </select>
      </p>
    <p>Year___<input type="text" name="year"/> or  
    <input type="radio" name="yearAfter" value="before" checked>Before
    <input type="radio" name="yearAfter" value="after">After</p>
    </form>
<div id="list">
<?php 
/**
 * Connect to database and execute queries
 */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "smt_rentals";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    die("Connection failure");
} else {
    if ($boolT) {
        $conn->query(
            "UPDATE Movie SET Frequency= Frequency + 1 WHERE Title ='$title'"
        );
    }
    $res =  $conn->query($sqlSelect);
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
                echo 
            "<span style=font-size:26px;><u><i>".$row["Title"]."</i></u></span>".
            "<span style=color:#659df7;> Studio: </span>".$row["Studio"].
            "<span style=color:red;> Status: </span>".$row["Status"].
            "<span style=color:#c165f7;> Sound: </span>".$row["Sound"].
            "<span style=color:#00d5ff;> Versions: </span>".$row["Versions"].
            "<span style=color:#fff319;> RecRetPrice: </span>".$row["RecRetPrice"].
            "<span style=color:#f765e3;> Rating: </span>".$row["Rating"].
            "<span style=color:#f7bf65;> Year: </span>".$row["Year"].
            "<span style=color:#ba1d1d;> Genre: </span>".$row["Genre"].
            "<span style=color:#2ee87e;> Aspect: </span>".$row["Aspect"]."<br><br>";
        }
    } else if ($sqlSelect === "") {
        echo "<br>Results";
    } else {
            echo "Sorry no movies matching that description found";
    }
}
    $conn->close();
?>
</div>
  </div>
  <div class="footer">
    <?php require_once 'include/inc_footer.php'; ?>
  </div>
</div>
</body>
</html>
