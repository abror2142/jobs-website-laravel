<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Category extends Model
{
    protected $guarded = [];

    public function jobs () {
        return $this->hasMany(Job::class);
    }
}
