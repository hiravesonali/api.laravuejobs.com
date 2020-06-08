<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['title', 'company_id', 'position_type', 'is_remote', 'contact_person', 'contact_person_email',
    'apply_url', 'salary', 'description', 'published_at'];

    protected $casts = [
        'active' => 'boolean',
        'position_type' => 'array'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
