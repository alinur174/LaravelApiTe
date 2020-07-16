<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    public function news()
    {
        return $this->hasMany(News::class, 'author_id');
    }
    public $timestamps = false;

    protected $guarded = [];

}
