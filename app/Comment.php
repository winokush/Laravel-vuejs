<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['respond_to_id', 'name', 'url', 'body'];

    protected $appends = ['human_created_at'];

    protected $with = ['children'];

    public function getHumanCreatedAtAttribute ()
    {
        return $this->created_at->diffForHumans();
    }

    public function children ()
    {
        return $this->hasMany(Comment::class, 'respond_to_id');
    }
}
