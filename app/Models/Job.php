<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $table = 'job_openings';
    protected $guarded = [];

    public function tags () {
        return $this->belongsToMany(Tag::class);
    }

    public function company () {
        return $this->belongsTo(Company::class);
    }
}
