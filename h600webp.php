<?php
include_once ('functions.php');

resizeBatch(
	'*.webp',
	'_1000x600.jpg',
	$inputDir = './input/',
	$outputDir = './landscape/',
    $width = 1000,
    $height= 600
);

echo "Image resize done.";
