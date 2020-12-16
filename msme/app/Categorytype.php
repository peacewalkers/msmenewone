<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorytype extends Model

{
    protected $guarded = [];
    public function subcategories(){
        return $this->hasMany('App\Categorytype', 'parent_id');
    }

    public function categories () {
        return $this->hasMany('App\Category');
    }
}
