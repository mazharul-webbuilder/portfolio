<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PortfolioController extends Controller
{
    public function details(Request $request): JsonResponse
    {
        $portfolio = Portfolio::find($request->id);
        return response()->json([
            'thumbnail' => asset('uploads/portfolio/resize' . '/' . $portfolio->image),
            'category' => $portfolio->portfolioCategory->name,
            'title' => $portfolio->title,
            'description' => $portfolio->description,
        ]);
    }}
