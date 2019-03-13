<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\DashboardViewRequest;
use App\Models\BlogCategories\BlogCategory;
use App\Models\Page\Page;
use App\Repositories\Frontend\Pages\PagesRepository;


/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(DashboardViewRequest $request)
    {
        return view('frontend.user.dashboard');
    }

    public function getItems()
    {
        //$items = Item::with('categories')->get()->groupBy('category_id');
        $categories = BlogCategory::orderBy('id', 'asc')->get();
        return view('frontend.user.dashboard')->with('categories',$categories);
    }

    // public function show()
    // {
    //     $page = Page::orderBy('id','asc')->get();
    //     return view('frontend.user.dashboard')->with('page',$page);
            
    // }
    // public function showPage($slug, PagesRepository $pages)
    // {
    //     $result = $pages->findBySlug($slug);

    //     return view('frontend.pages.index')
    //         ->withpage($result);
    // }


}
