<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function parents()
    {
    	return $this->belongsTo(Group::class, 'parent_id');
    }

    public function children()
    {
    	return $this->hasMany(Group::class, 'parent_id');
    }

    public function contact()
    {
    	return $this->hasMany(Contact::class);
    }

}
