<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Intervention\Image\Facades\Image;

class ResizeImages extends Component
{
    public function render()
    {


        return view('livewire.resize-images');
    }

    public function resizeImage($filename, $width, $height)
    {
        $originalImagePath = public_path('images/ourglass_logo.jpg');
        $resizedImagePath = public_path('resizeImages/logo.jpg');

        $image = Image::make($originalImagePath)
            ->fit($width, $height)
            ->save($resizedImagePath);

        return asset('resizeImages/logo.jpg');
    }

}