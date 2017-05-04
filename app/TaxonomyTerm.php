<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxonomyTerm extends Model
{
	protected $table = 'taxonomy_term_data';

    protected $fillable = [
        'vid', 'name', 
    ];

	// public function TaxonomyIndexPivot(Model $parent, array $attributes, $table, $exists)
	// {
	//     return new YourCustomPivot($parent, $attributes, $table, $exists);
	// }

	// public function TaxonomyIndexPivot()
	// {
	//     return new YourCustomPivot('App\TaxonomyTerm', 'nid', 'taxonomy_index', 'tid');
	// }

    // public function nodes()
    // {
    //     return $this->belongsToMany('App\Node', 'taxonomy_index', 'nid', 'tid');
    // }

    // public function nodes()
    // {
    //     return $this->belongsToMany('App\Node')->using('App\UserRole');
    // }


}
