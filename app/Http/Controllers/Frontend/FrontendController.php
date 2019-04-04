<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;
use App\Repositories\Backend\Blogs\BlogsRepository;
use App\Models\BlogCategories\BlogCategory;
use App\Models\Blogs\Blog;
use App\Models\BlogTags\BlogTag;
use App\Models\Blogs\Traits\Relationship\BlogRelationship;
use App\Models\BlogCategories\Traits\Relationship\BlogCategoryRelationship;
use App\Models\BlogTags\Traits\Relationship\BlogTagRelationship;


/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.index', compact('google_analytics', $google_analytics));

    }

    /**
     * show page by $page_slug.
     */
    public function showPage($slug, PagesRepository $pages)
    {
        $result = $pages->findBySlug($slug);
        $post   = Blog::latest()->where('status','published')->paginate(3);

        return view('frontend.pages.index',compact('post'))
            ->withpage($result);
    }
}
