<?php

namespace App\Filters;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class Medium implements FilterInterface {
	public function applyFilter(Image $image) {

		$image->fit(600, 800, function ($constraint) {
			$constraint->aspectRatio();
		});

		return $image;
	}
}