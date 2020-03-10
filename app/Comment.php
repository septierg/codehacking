<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'post_id', 'author', 'email', 'body', 'is_active',
    ];
    //creating relationship comment has many reply
    public function replies(){
        return $this->hasMany('App/CommentReplies');

    }
}
