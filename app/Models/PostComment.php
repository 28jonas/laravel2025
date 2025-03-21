<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    /** @use HasFactory<\Database\Factories\PostCommentFactory> */
    use HasFactory;

    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    //parent comment relation
    public function parent(){
        return $this->belongsTo(PostComment::class,'parent_id');
    }
    //Child comments relation
    public function children(){
        return $this->hasMany(PostComment::class, 'parent_id');
    }


}
