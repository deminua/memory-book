<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxonomyTerm extends Model {
	protected $table = 'taxonomy_term_data';

	protected $fillable = [
		'name', 'status',
	];

	protected $casts = [
		'status' => 'boolean',
	];

	public $timestamps = false;

	public function nodes() {
		return $this->belongsToMany('App\Node', 'node_taxonomy', 'taxonomy_id', 'node_id');
	}

}
