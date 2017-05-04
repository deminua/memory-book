<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $table = 'file_managed';

    protected $fillable = [
        'filename', 'uri', 'filesize', 'filemime', 'status'
    ];

    public $timestamps = false;

/*    public function node()
    {
        return $this->hasOne('App\Node', 'field_data_field_image');
    }*/
}
