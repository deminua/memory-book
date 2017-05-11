<?php

namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Mini implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        #return $image->resize(1600, null)->insert('images/watermark.png');

/*        $image->widen(100, function ($constraint) {
    			$constraint->upsize();
		});

        
        $image->crop(100, 100, 25, 25);*/

	$image->resize(100, null, function ($constraint) {
	    $constraint->upsize();
	    $constraint->aspectRatio();
	});

	$image->resizeCanvas(100, 100);
	
       return $image->greyscale();

		#return $image->insert('images/watermark.png', 'bottom-right', 20, 20);

    }
}