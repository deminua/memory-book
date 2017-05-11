<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Node extends Model
{

	protected $table = 'node';

    protected $fillable = [
        'title', 'body', 'education', 'birthdate', 'birthplace', 'deaddate', 'deadplace', 'info', 'type', 'status'
    ];


    public function taxonomy()
    {
        return $this->belongsToMany('App\Taxonomy');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Taxonomy', 'node_taxonomy', 'node_id', 'taxonomy_id');
    }

    public function image()
    {
        return $this->belongsToMany('App\Image', 'field_data_field_image');
    }

    public function gallery()
    {
        return $this->belongsToMany('App\Image', 'field_data_field_gallery');
    }

    public function gallery2main()
    {
        return $this->belongsToMany('App\Image', 'field_data_field_gallery')->limit(3);
    }

    public function getBirthdateAttribute($date)
    {   

        if(isset($date)) {

        $date = explode('-', $date);

        if($date[0] != '0000') { $year = $date[0]; } else { $year = ""; }
        if($date[1] != '00') { $month = $date[1].'.'; } else { $month = ""; }
        if($date[2] != '00') { $day = $date[2].'.'; } else { $day = ""; }

        $date = $day.$month.$year;

        if(empty($date)) {
            return null;
        }

        return $date;
        }
            return null;
    }

    public function getDeaddateAttribute($date)
    {   
        if(isset($date)) {
        $date = explode('-', $date);
        if($date[0] != '0000') { $year = $date[0]; } else { $year = ""; }
        if($date[1] != '00') { $month = $date[1].'.'; } else { $month = ""; }
        if($date[2] != '00') { $day = $date[2].'.'; } else { $day = ""; }
        
        $date = $day.$month.$year;
        
        if(empty($date)) {
            return null;
        }
        return $date;
        }
            return null;
    }

    public function years()
    {
        $birthdate = explode('-', $this->attributes['birthdate']);
        $deaddate = explode('-', $this->attributes['deaddate']);

        if($birthdate[0] > 1) {
            if($birthdate[0] and $deaddate[0]) { return $birthdate[0].' - '.$deaddate[0]; }
            if($birthdate[0]) { return $birthdate[0]; }
        }
    }

    public function setBirthdateAttribute($date)
    {
        $date = explode('.', $date);
        $date = array_reverse($date);

        if(!empty($date[0])) { $year = $date[0]; } else { $year = "0000"; }
        if(!empty($date[1])) { $month = $date[1]; } else { $month = "00"; }
        if(!empty($date[2])) { $day = $date[2]; } else { $day = "00"; }

        $date = ''.$year.'-'.$month.'-'.$day.'';

        if($date == '0000-00-00')  {
         $this->attributes['birthdate'] = null;
        } else {
         $this->attributes['birthdate'] = $date;
        }
    }

    public function setDeaddateAttribute($date)
    {
        $date = explode('.', $date);
        $date = array_reverse($date);

        if(!empty($date[0])) { $year = $date[0]; } else { $year = "0000"; }
        if(!empty($date[1])) { $month = $date[1]; } else { $month = "00"; }
        if(!empty($date[2])) { $day = $date[2]; } else { $day = "00"; }

        $date = ''.$year.'-'.$month.'-'.$day.'';


        if($date == '0000-00-00')  {
         $this->attributes['deaddate'] = null;
        } else {
         $this->attributes['deaddate'] = $date;
        }


    }

}
