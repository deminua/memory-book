<?php

namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Gallery implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        #return $image->resize(1600, null)->insert('images/watermark.png');

        $image->widen(800, function ($constraint) {
    			$constraint->upsize();
		});
        
        $image->fit(800, 600, function ($constraint) {
          $constraint->aspectRatio();
        });
        
        return $image;
		#return $image->insert('images/watermark.png', 'bottom-right', 20, 20);

    }
}