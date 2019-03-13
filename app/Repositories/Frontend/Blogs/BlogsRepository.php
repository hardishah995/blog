<?php

namespace App\Repositories\Frontend\Blogs;

use App\Exceptions\GeneralException;
use App\Models\Blogs\Blog;
use App\Repositories\BaseRepository;

/**
 * Class PagesRepository.
 */
class BlogsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Blog::class;

    /*
    * Find blog by slug
    */
    public function findBySlug($slug)
    {
        if (!is_null($this->query()->whereslug($slug)->firstOrFail())) {
            return $this->query()->whereslug($slug)->firstOrFail();
        }

        throw new GeneralException(trans('exceptions.backend.access.blog.not_found'));
    }
}
