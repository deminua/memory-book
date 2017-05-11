<?php

namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class GalleryMini implements FilterInterface
{
    public function applyFilter(Image $image)
    {

        $image->widen(128, function ($constraint) {
    			$constraint->upsize();
		});
        
        $image->fit(128, 64, function ($constraint) {
          $constraint->aspectRatio();
        });
        
        return $image->greyscale();

    }
}