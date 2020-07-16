<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];
    public function authors()
    {
        return $this->belongsTo(Authors::class, 'id');
    }

    public function rubrics()
    {
        return $this->belongsTo(Rubrics::class, 'id');
    }
}
