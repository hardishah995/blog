<?php

namespace App\Models\BlogTags\Traits\Relationship;

use App\Models\Blogs\Blog;
use App\Models\Access\User\User;

/**
 * Class BlogTagRelationship.
 */
trait BlogTagRelationship
{
    /**
     * BlogTags belongs to relationship with state.
     */
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_map_tags','tag_id','blog_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
