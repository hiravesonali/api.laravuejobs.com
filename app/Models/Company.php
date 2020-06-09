<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    protected $appends = [
        'image'
    ];

    public function getImageAttribute()
    {
        return $this->logo ? Storage::url($this->logo) : '';
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
