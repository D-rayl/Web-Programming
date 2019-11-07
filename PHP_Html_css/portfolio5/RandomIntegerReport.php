<?php
/**
 * Random Number Bar Chart Generator
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
header("Content-type: image/png");    
$v1 = $_GET['one'];
$v2 = $_GET['two'];
$v3 = $_GET['three'];
$v4 = $_GET['four'];
$v5 = $_GET['five'];
$v6 = $_GET['six'];
$v7 = $_GET['seven'];
$v8 = $_GET['eight'];
$v9 = $_GET['nine'];
$v10 = $_GET['ten'];
$values = array($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10); 
$labels = array("One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten");
$height = 480;
$width = 755;
$padding = 20;
$column_width = $width / 10;    
$gridTop = 70;
$gridLeft = 40;
$gridBottom = 420;
$gridRight = 670;
$gridHeight = $gridBottom - $gridTop;
$gridWidth = $gridRight - $gridLeft;
$lineWidth = 1;
$barWidth = 20;
$font = 'OpenSans-Regular.ttf';
$fontSize = 10;
$labelMargin = 8;
$yMaxValue = 200;
$yLabelSpan = 40;    
$image = imagecreate($width, $height);
$blue = imagecolorallocate($image, 50, 150, 150);
$grey = imagecolorallocate($image, 239, 239, 239);
$grey_dark = imagecolorallocate($image, 99, 97, 93);
$grey_lite = imagecolorallocate($image, 158, 148, 148);
$black = imagecolorallocate($image, 0, 0, 0);
$orange = imagecolorallocate($image, 252, 158, 7);
$red = imagecolorallocate($image, 249, 7, 7);
imagefill($image, 0, 0, $grey);
imagesetthickness($image, $lineWidth);    
$max_value = max($values);    
imageline($image, $gridLeft, 10, $gridRight, 10, $orange);
imageline($image, $gridLeft, 10, $gridLeft, 40, $orange);
imageline($image, $gridLeft, 40, $gridRight, 40, $orange);
imageline($image, $gridRight, 10, $gridRight, 40, $orange);    
imagestring($image, 31, 220, 20, 'This is Random Integer Report', $black);
imagestring($image, 31, $gridLeft+5, 70, 'Count', $black);
imagestring($image, 31, $gridRight+5, $gridBottom, 'Numbers', $black);    
$barSpacing = $gridWidth / 10.5;
$itemX = $gridLeft + $barSpacing;
for ($i=0; $i<10; $i++) {
    $column_height = (($height-100) / 100) * (( $values[$i] / $max_value) *100);   
    $x1 = $itemX-$column_width/2; 
    $y1 = $height-$column_height; 
    $x2 = $itemX + $barWidth / 2 -$padding; 
    $y2 = $gridBottom; 
    imagefilledrectangle($image, $x1, $y1, $x2, $y2, $blue);
    imageline($image, $x1+1, $y1-1, $x2+1, $y1-1, $grey_dark); 
    imageline($image, $x2+1, $y1-1, $x2+1, $y2, $grey_dark); 
    imageline($image, $x1+2, $y1-2, $x2+2, $y1-2, $grey_lite); 
    imageline($image, $x2+2, $y1-2, $x2+2, $y2, $grey_lite);
    imagestring($image, 31, $x1-1, $gridBottom+5, $labels[$i], $black);
    imagestring($image, 31, $x1+2, $gridBottom+20, $values[$i], $red);    
    $itemX += $barSpacing;
}
imageline($image, $gridLeft, $gridTop, $gridLeft, $gridBottom, $black);
imageline($image, $gridLeft, $gridBottom, $gridRight, $gridBottom, $black);    
imagepng($image);
imagedestroy($image);
?>
