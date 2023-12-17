<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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

    /**
     * Blog create page
    */
    public function create(): View
    {
        $blogCategories = BlogCategory::all();

        return \view('admin.blog.create', compact('blogCategories'));
    }

    /**
     * Post new blog
    */
    public function postBlog(PostCreateRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $datas = $request->except('_token', 'image');

            $blog = Blog::create($datas);

            if ($request->hasFile('image')) {
                $blog->image = store_2_type_image_nd_get_image_name(request: $request, folderName:  'blog-image', resize_width: 800, resize_height: 600);
                $blog->save();
            }

            DB::commit();
            return \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Post created Successfully'
            ]);

        }catch (\Exception $exception){
            DB::rollBack();
            return \response()->json([
                'response' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'type' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }



}
