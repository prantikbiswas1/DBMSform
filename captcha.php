<?php
session_start();

/* Create a 220x35 image */
$im = imagecreatetruecolor(220, 35);

/* Color code for orange */
$orange = imagecolorallocate($im, 0xFF, 0x8c, 0x00);

/* Color code for white */
$white = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);

/* Generate a random string using md5 */
$md5_hash = md5(rand(0,999));

/* Trim the string down to 6 characters */
$captcha_code = substr($md5_hash, 15, 6);

// Store the value of the generated captcha code in session
$_SESSION['captcha'] = $captcha_code;

/* Set the background as orange */
imagefilledrectangle($im, 0, 0, 220, 35, $orange);

/* Draw our randomly generated code */
$font_size = 20;
$text_width = imagefontwidth($font_size) * strlen($captcha_code); // Calculate the width of the text
$text_height = imagefontheight($font_size); // Get the height of the font
$text_x = (220 - $text_width) / 2; // Calculate the x-coordinate to center the text horizontally
$text_y = (35 - $text_height) / 2; // Calculate the y-coordinate to center the text vertically
imagestring($im, $font_size, $text_x, $text_y, $captcha_code, $white);

/* Output the image to the browser */
header('Content-Type: image/png');
imagepng($im);

/* Destroy */
imagedestroy($im);
?>
