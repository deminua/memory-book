<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
	protected $table = 'taxonomy_term_data';

    protected $fillable = [
        'name', 'vocabulary_id',
    ];

    public $timestamps = false;

    public function vocabulary2()
    {
    	return $this->hasOne('App\Vocabulary', 'id', 'vocabulary_id');
    }

    //OR

    public function vocabulary()
    {
    	return $this->belongsTo('App\Vocabulary');
    }
/*
    public function vocabulary()
    {
    	return $this->hasOne('App\Vocabulary', 'id', 'vocabulary_id');
        #return $this->belongsTo('App\Vocabulary');
        #return $this->hasOne('App\Vocabulary');
    }

    public function vocabularys()
    {
    	return $this->hasMany('App\Vocabulary', 'id', 'vocabulary_id');
    }
*/

}
