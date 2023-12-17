<?php

namespace App\Http\Controllers;

use App\Http\Requests\PricingUpdateRequest;
use App\Models\Pricing;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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
        $query = Pricing::query()->orderBy('id', 'ASC');

        return DataTables::of($query)
            ->addColumn('category', function ($price){
                return $price->pricingCategory?->name;
            })
            ->addColumn('image', function ($price) {
                return '<img src="' . asset('uploads/prices/resize' . '/' . $price->image) . '" alt="price image" height="50" width="50">';
            })
            ->addColumn('action', function ($price){
                return '<div>
                            <a
                            class=" btn btn-primary waves-effect waves-light btn btn-primary"
                            href="'.route('admin.pricing.edit', $price->id).'">Edit</a>
                        </div>
                        ';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    /**
     * Edit Price
    */
    public function edit(Pricing $id) : View
    {
        return \view('admin.pricing.edit', compact('id'));
    }

    /**
     * Update Client Data
     */
    public function update(PricingUpdateRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $pricing = Pricing::find($request->id);

            $datas = $request->validated();

            $pricing->update($datas);

            DB::commit();
            return \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Price Info Updated Successfully'
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
