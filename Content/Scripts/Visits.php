<?php
// This script returns a png image of the number of visits.
// Number of visits are saved in a text file.  The background
// color of the image is passed as a hexadecimal number.
// e.g. <img src="http://www.purplebutter.com/IrontonCatholicChurches/visits.php?color=0xf4ffe4">
// This script must be given write access.

$filename = 'Visits.txt';
if (file_exists($filename)) {
  $numVisits = file_get_contents($filename);
} else {  // File does not exist
  $numVisits = 0;
}
$numVisits = $numVisits + 1;

$file = fopen($filename, 'w');  // Save the number of visits.  Create file if necessary
fwrite($file, $numVisits);
fclose($file);

header("Content-type: image/png");  // Will be returning a png
$im     = imagecreatetruecolor(100, 25);

$color = hexdec($_GET['color']);  // Color is passed as a hexadecimal
$red = ($color & 0xff0000) >> 16; // Strip out rgb
$green = ($color & 0x00ff00) >> 8; 
$blue = ($color & 0x0000ff);
$backgroundcolor = imagecolorallocate($im, $red, $green, $blue);
imagefill($im, 0, 0, $backgroundcolor);  // Fill with background color

$textcolor = imagecolorallocate($im, 0, 0, 0);
$px     = (imagesx($im) - 7.5 * strlen($numVisits)) / 2; // Center horizontally
imagestring($im, 6, $px, 9, $numVisits, $textcolor);

imagepng($im);  // Output the image to the calling page
imagedestroy($im);
?>
