<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'avatar',
        'address',
        'city',
        'zip',
        'email',
        'phone',
        'note',
    ];

    public function getAvatarAttribute($value)
    {
        return $value ? '/upload/images/' . $value : '';
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'contact_group');
    }
}
