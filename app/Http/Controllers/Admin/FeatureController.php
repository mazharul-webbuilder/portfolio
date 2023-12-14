<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureUpdateRequest;
use App\Models\Feature;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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

    /**
     * Return feature data
    */
    public function getFeature(Request $request): JsonResponse
    {
        return response()->json(Feature::find($request->featureId));
    }

    /**
     * Update Features
    */
    public function updateFeature(FeatureUpdateRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $datas = $request->except('id');
            $feature = Feature::find($request->id);
            $feature->update($datas);
            DB::commit();
            return \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Feature Updated Successfully'
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'response' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'type' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }
}
