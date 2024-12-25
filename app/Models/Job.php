<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $table = 'job_openings';
    protected $guarded = [];
    
    public function category () {
        return $this->belongsTo(Category::class);        
    }

    public function tags () {
        return $this->belongsToMany(Tag::class);
    }

    public function company () {
        return $this->belongsTo(Company::class);
    }
}
