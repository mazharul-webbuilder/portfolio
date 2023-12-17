<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PricingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * View Pricing
    */
    public function index(): View
    {
        return \view('admin.pricing.index');
    }

    /**
     * datatable
     */
    public function datatable(): JsonResponse
    {
        $query = Pricing::query()->orderByDesc('id');

        return DataTables::of($query)
            ->addColumn('category', function ($price){
                return $price->pricingCategory?->name;
            })
            ->addColumn('image', function ($price) {
                return '<img src="' . asset('uploads/prices/resize' . '/' . $price->image) . '" alt="price image" height="50" width="50">';
            })
            ->addColumn('action', function ($price){
                return '<div>
                            <button type="button"
                            data-toggle="modal"
                            class="priceEditBtn btn btn-primary waves-effect waves-light btn btn-primary"
                            data-id="' . $price->id . '">Edit</button>
                        </div>
                        ';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }
}
