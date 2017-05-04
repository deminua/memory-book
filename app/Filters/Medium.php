<?php

namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Medium implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        
        $image->fit(600, 800, function ($constraint) {
          $constraint->aspectRatio();
        });

        /*
      $image->resize(400, null, function ($constraint) {
          $constraint->upsize();
          $constraint->aspectRatio();
      });
      */

       return $image;
    }
}