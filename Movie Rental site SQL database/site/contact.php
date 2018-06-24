<!doctype html>
<html>
<head>
<title><?php echo basename(__FILE__, '.php'); ?></title>
<link href="main.css" rel="stylesheet" type="text/css">
</head>

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
    <h1>Contact Us</h1>
    <p>email: smt_rentals@movies.com</p>
    <p>phone: 0000-1111</p>
  </div>
  <div class="footer">
    <?php include_once('include/inc_footer.php'); ?>
  </div>
</div>
</body>
</html>
