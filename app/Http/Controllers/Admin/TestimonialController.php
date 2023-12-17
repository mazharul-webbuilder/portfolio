<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show Testimonials
     */
    public function index(): View
    {
        return \view('admin.testimonial.index');
    }

    /**
     * Yajra SSR datatable
     */
    public function datatable(): JsonResponse
    {
        $query = Testimonial::query()->orderByDesc('id');

        return DataTables::of($query)
            ->addColumn('image', function ($testimonial) {
                return '<img src="' . asset('uploads/testimonial/resize' . '/' . $testimonial->avatar) . '" alt="testimonial image" height="50" width="50">';
            })
            ->addColumn('action', function ($testimonial){
                return '<div>
                            <a
                            href="'.route('admin.blog.edit', ['id' => $testimonial->id]).'"
                            class=" btn btn-primary waves-effect waves-light btn btn-primary"
                        >Edit</a>
                             <button type="button"
                            data-toggle="modal"
                            class="testimonialDeleteBtn btn btn-danger waves-effect waves-light btn btn-primary"
                            data-id="' . $testimonial->id . '">Delete</button>
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
        return \view('admin.testimonial.create');
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

    /**
     * Edit Blog
     */
    public function edit(Blog $id): View
    {
        $blogCategories = BlogCategory::all();
        return \view('admin.blog.edit', compact('id', 'blogCategories'));
    }

    /**
     * Update  Data
     */
    public function update(PostCreateRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $blog = Blog::find($request->id);

            $datas = $request->except('_token', 'image');

            $blog->update($datas);

            if ($request->hasFile('image')) {
                if (!is_null($blog->image)) {
                    delete_2_type_image_if_exist_latest($blog->image, 'blog-image');
                }
                $blog->image = store_2_type_image_nd_get_image_name($request, 'blog-image', 800, 600);
                $blog->save();
            }


            DB::commit();
            return \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Blog Post Updated Successfully'
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

    /**
     * Delete
     */
    public function delete(Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $client = Testimonial::find($request->id);
            if (!is_null($client->avatar)) {
                delete_2_type_image_if_exist_latest(imageName: $client->avatar, folderName: 'testimonial');
            }
            $client->delete();
            DB::commit();
            return  \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Testimonial Deleted Successfully'
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }

}
