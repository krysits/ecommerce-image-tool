<?php
/**
 *  initialisation file
 */

$directories = ['./input/', './landscape/', './square/'];

$counter = 0;

foreach ($directories as $dir)
{
    if (!is_dir($dir))
    {
        $result = mkdir($dir, 0755, true);
        if($result)
        {
            $counter++;
        }
    }
}

echo "Init file loaded.\n";
echo "Directories created: $counter\n";