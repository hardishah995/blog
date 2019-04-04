<?php

namespace App\Models\Comments;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'author_id',
        'post_id',
        'content',
        'posted_at'
    ];

    public function blogs()
    {
        return $this->belongsTo(Blog::class);
    } 

    public function owner()
    {
        return $this->belongsTo(User::class,'author_id');
    }
}
