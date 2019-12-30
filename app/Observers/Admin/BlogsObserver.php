<?php

namespace App\Observers\Admin;


use App\Model\admin\blog;
use Illuminate\Support\Facades\Cache;

class BlogsObserver
{

    /**
     * Handle the blog "deleted" event.
     *
     * @param blog $blog
     * @return void
     */
    public function creating(blog $blog)
    {
        $blog->slug = str_slug($blog->title);
    }

    /**
     * Handle the blog "deleted" event.
     *
     * @param blog $blog
     * @return void
     */
    public function updating(blog $blog)
    {
        $blog->slug = str_slug($blog->title);
    }

    /**
     * Handle the blog "deleted" event.
     *
     * @param blog $blog
     * @return void
     */
    public function deleted(blog $blog)
    {
        $blog->delete();
    }
}
