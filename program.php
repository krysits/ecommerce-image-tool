<?php
/**
 * * This script resizes all images in the input directory to 1000x1000 pixels
 * * and saves them in the output directory with a modified filename.
 * @author  @krysits
 * @url https://github.com/krysits
*/

include_once('functions.php');

$formats = [
    'jpg',
    'jpeg',
    'gif',
    'avif',
    'png',
    'webp',
];

foreach ($formats as $format) {
    resizeBatch(
        '*.' . $format,
        '_1000x1000.jpg',
        $inputDir = './input/',
        $outputDir = './square/',
        $width = 1000,
        $height = 1000
    );

    resizeBatch(
        '*.' . $format,
        '_1000x600.jpg',
        $inputDir = './input/',
        $outputDir = './landscape/',
        $width = 1000,
        $height = 600
    );
}
echo "Image resize done.";
