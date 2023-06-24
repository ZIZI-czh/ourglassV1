<?php
namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\Log;

class ImageController extends Controller
{



    public function resizeImage()
    {
        dd("1");

        $originalImagePath = public_path('public/images/ourglass_logo.jpg');
        $resizedImagePath = public_path('public/images/logo.jpg');
        $resizedWidth = 300; // Adjust the desired width of the resized logo
        dd("1");
        $image = Image::make($originalImagePath)
            ->resize($resizedWidth, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($resizedImagePath);

        return response()->file($resizedImagePath);
    }
}