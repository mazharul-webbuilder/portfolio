<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function details(Request $request): JsonResponse
    {
        $blog = Blog::find($request->id);
        return response()->json([
            'created_at' => Carbon::parse($blog->created_at)->format('d-m-Y h:i A'),
            'title' => $blog->title,
            'description' => $blog->description,
            'thumbnail' => asset('uploads/blog-image/resize' . '/' . $blog->image),
        ]);
    }
}
