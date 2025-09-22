<?php

/**
 * This script resizes all JPG images in the input directory to 1000x1000 pixels
 * and saves them in the output directory with a modified filename.
 */

include_once ('functions.php');

resizeBatch('*.jpg', '_1000x1000.jpg', './input/', './square/', 1000, 1000);

echo "Image resize done.";
