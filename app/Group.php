<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    const NAMES = [
        'Family',
        'Friends',
        'Work',
        'Food'
    ];

    protected $fillable = [
        'name'
    ];

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'contact_group');
    }
}
