<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show list of features
    */
    public function index(): View
    {
        return \view('admin.feature.index');
    }

    /**
     * features datatable
     */
    public function datatable(): JsonResponse
    {
        $query = Feature::query();

        return DataTables::of($query)
                     ->addColumn('action', function ($menu){
                return '<button type="button"
                 data-toggle="modal"
                 class="menuEditBtn btn btn-primary waves-effect waves-light btn btn-primary"
                 data-id="' . $menu->id . '">Edit</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
