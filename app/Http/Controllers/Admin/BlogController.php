<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show Blogs
     */
    public function index(): View
    {
        return \view('admin.blog.index');
    }

    /**
     * Yajra SSR datatable
     */
    public function datatable(): JsonResponse
    {
        $query = Blog::query()->orderByDesc('id');

        return DataTables::of($query)
            ->addColumn('category', function ($blog){
                return $blog->blogCategory?->name;
            })
            ->addColumn('image', function ($blog) {
                return '<img src="' . asset('uploads/blog-image/resize' . '/' . $blog->image) . '" alt="blog image" height="50" width="50">';
            })
            ->addColumn('action', function ($blog){
                return '<div>
                            <button type="button"
                            data-toggle="modal"
                            class="blogEditBtn btn btn-primary waves-effect waves-light btn btn-primary"
                            data-id="' . $blog->id . '">Edit</button>
                             <button type="button"
                            data-toggle="modal"
                            class="blogDeleteBtn btn btn-danger waves-effect waves-light btn btn-primary"
                            data-id="' . $blog->id . '">Delete</button>
                        </div>
                        ';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

}
