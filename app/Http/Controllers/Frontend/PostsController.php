<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategories\BlogCategory;
use App\Models\Blogs\Blog;
use App\Models\BlogTags\BlogTag;
use App\Models\Blogs\Traits\Relationship\BlogRelationship;
use App\Models\BlogCategories\Traits\Relationship\BlogCategoryRelationship;
use App\Models\BlogTags\Traits\Relationship\BlogTagRelationship;


class PostsController extends Controller
{
    /**
     * Show all the Posts in Home Page
     */
    public function index()
    {
        $post       = Blog::latest()->where('status','published')->paginate(5);
        $categories = BlogCategory::orderBy('id','asc')->where('status',1)->withCount('blogs')->get();
        $tags       = BlogTag::orderBy('id','asc')->where('status',1)->get();
        
        return view('frontend.index',compact('post','categories','tags'));
    }

    
}
