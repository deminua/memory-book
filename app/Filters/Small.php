<?php

namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Small implements FilterInterface
{
    public function applyFilter(Image $image)
    {

	/*$image->resize(400, null, function ($constraint) {
		$constraint->aspectRatio();
	    $constraint->upsize();
	});*/

	$image->fit(600, 800, function ($constraint) {
       		$constraint->aspectRatio();
	});

    	#$image->resizeCanvas(600, 100);

/*
       $image->resize(300, 800, function ($constraint) {
       		$constraint->aspectRatio();
		    $constraint->upsize();
		});
       */


	$image->resize(400, null, function ($constraint) {
	    $constraint->upsize();
	    $constraint->aspectRatio();
	});
       return $image->greyscale();
       #return $image->greyscale();
       #return $image->resizeCanvas(400, 600, 'center')->greyscale();

        #return $image->fit(200, 300);
    }
}