<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = ['id'];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'contact_group');
    }
}
