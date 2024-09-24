<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogRepository;

    public function __construct(BlogRepository $blogRepository) {
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        $blogs = $this->blogRepository->get([
            'order' => 'created_at desc',
            'pagination' => 5
        ]);

        return view('frontend.blog', [
            'blogs' => $blogs
        ]);
    }
}
