<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;
class Rubrics extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function news()
    {
        return $this->hasMany(News::class, 'rubric_id');
    }

}
