<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

	protected $fillable = [
		'name',
		'email',
		'phone'
	];

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class, 
            'contacts_tags', 
            'contact_id', 
            'tag_id'
        );
    }

    public function group()
    {
    	return $this->belongsTo(Group::class);
    }
}
