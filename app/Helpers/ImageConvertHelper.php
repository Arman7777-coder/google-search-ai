<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\File;

if (!function_exists('imageConvert')) {
    function imageConvert($image, $path): string
    {
        $url = public_path($path);
        $extension = $image->getClientOriginalExtension();
        $fileName = time() + rand(1, 99999) + rand(1, 99999) + rand(1, 99999);
        $image->move($url, $fileName);

        if ($extension == 'png') {
            $im = imagecreatefrompng($url . $fileName);
            imagepalettetotruecolor($im);
            imagealphablending($im, true);
            imagesavealpha($im, true);
            imagepng($im, $url . $fileName . '.png', -1);
            File::delete($url . $fileName);

        } else {
            try {
                $im = imagecreatefromjpeg($url . $fileName);
                imagejpeg($im, $url . $fileName . '.' .$extension, -1);
            } catch (Exception $ex) {
                $im = imagecreatefrompng($url . $fileName);
                imagepalettetotruecolor($im);
                imagealphablending($im, true);
                imagesavealpha($im, true);
                imagepng($im, $url . $fileName . '.png', -1);
                $extension = 'png';
            }
            File::delete($url . $fileName);

        }
        return $path . $fileName . '.'.$extension;
    }
}
