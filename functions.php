<?php
/**
 * Resize an image to fit within specified dimensions while maintaining aspect ratio.
 * The resized image is centered on a white background if it doesn't fill the entire area.
 * @param string $sourcePath Path to the source image.
 * @param string $destinationPath Path to save the resized image.
 * @param int $newWidth Desired width of the output image.
 * @param int $newHeight Desired height of the output image.
 * @return void
 */
function resize(
    $sourcePath = './input/input.jpg',
    $destinationPath = './landscape/output.jpg',
    $newWidth=1000,
    $newHeight=600
) {
// Load the original image

    list($originalWidth, $originalHeight) = getimagesize($sourcePath);

// Create a new blank image with the desired size (white background)
    $canvas = imagecreatetruecolor($newWidth, $newHeight);

// Set the background color to white
    $white = imagecolorallocate($canvas, 255, 255, 255);
    imagefill($canvas, 0, 0, $white);

// Load the original image
    $sourceImage = imagecreatefromstring(file_get_contents($sourcePath));

// Calculate new dimensions while maintaining the aspect ratio
    $resizeWidth = $newWidth;
    $resizeHeight = (int)($originalHeight * ($newWidth / $originalWidth));
    if ($resizeHeight > $newHeight) {
        $resizeHeight = $newHeight;
        $resizeWidth = (int)($originalWidth * ($newHeight / $originalHeight));
    }

// Center the resized image on the white background
    $xOffset = (int)(($newWidth - $resizeWidth) / 2);
    $yOffset = (int)(($newHeight - $resizeHeight) / 2);

// Resize and copy the image onto the canvas
    imagecopyresampled(
        $canvas,
        $sourceImage,
        $xOffset,
        $yOffset,
        0,
        0,
        $resizeWidth,
        $resizeHeight,
        $originalWidth,
        $originalHeight
    );

// Save the output image
    imagejpeg($canvas, $destinationPath, 100); // 90 is the quality (0-100)

// Free up memory
    imagedestroy($canvas);
    imagedestroy($sourceImage);
}
/**
 * @param string $filemask
 * @param string $outmask
 * @param string $inputDir
 * @param string $outputDir
 * @param int $width
 * @param int $height
 * @return void
 */
function resizeBatch(
    $filemask = '*_S.webp',
    $outmask = '_S.jpg',
    $inputDir = './input/',
    $outputDir = './square/',
    $width = 1000,
    $height= 1000
) {
    $inputReg = $inputDir.$filemask;

    foreach (glob($inputReg) as $file)
    {
        $outfile = str_replace(str_replace('*', '', $filemask), $outmask, $file);
        $outfile = str_replace($inputDir, $outputDir, $outfile);
        resize($file, $outfile, $width, $height);
        echo $outfile."\n";
    }
}