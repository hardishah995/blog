<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategories\BlogCategory;
use App\Models\Blogs\Blog;
use App\Models\BlogTags\BlogTag;
use App\Models\Blogs\Traits\Relationship\BlogRelationship;
use App\Models\BlogCategories\Traits\Relationship\BlogCategoryRelationship;
use App\Models\BlogTags\Traits\Relationship\BlogTagRelationship;
use App\Repositories\Backend\BlogCategories\BlogCategoriesRepository;
use App\Repositories\Backend\BlogTags\BlogTagsRepository;

class PostTagController extends Controller
{
    /**
     * Show blog by tag 
    */ 
    public function showPostsByTags($name)
    {
        $blogCategories = new BlogCategoriesRepository();
        $categories = $blogCategories->getActiveCategories();

        $blogTags = new BlogTagsRepository();
        $tags       = $blogTags->getActiveTags();

        $posts       = [];
        $blogPosts  = BlogTag::with('blogs')->where('name',$name)->first();
        if($blogPosts)
        {
            $posts = $blogPosts->blogs;
        }
        
        return view('frontend.show',compact('categories','tags','posts'));
    }
    
    
}