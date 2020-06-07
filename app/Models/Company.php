<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'slug', 'website', 'twitter_handle', 'email', 'apply_url', 'about'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
