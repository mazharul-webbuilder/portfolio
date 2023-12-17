<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show Index Page
    */
    public function index(): View
    {
        return \view('admin.portfolio.index');
    }

    /**
     * datatable
     */
    public function datatable(): JsonResponse
    {
        $query = Portfolio::query()->orderByDesc('id');

        return DataTables::of($query)
            ->addColumn('category', function ($portfolio){
                return $portfolio->portfolioCategory?->name;
            })
            ->addColumn('image', function ($portfolio) {
                return '<img src="' . asset('uploads/portfolio/resize' . '/' . $portfolio->image) . '" alt="portfolio image" height="50" width="50">';
            })
            ->addColumn('action', function ($portfolio){
                return '<div>
                            <button type="button"
                            data-toggle="modal"
                            class="ClientEditBtn btn btn-primary waves-effect waves-light btn btn-primary"
                            data-id="' . $portfolio->id . '">Edit</button>
                             <button type="button"
                            data-toggle="modal"
                            class="ClientDeleteBtn btn btn-danger waves-effect waves-light btn btn-primary"
                            data-id="' . $portfolio->id . '">Delete</button>
                        </div>
                        ';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }
}
