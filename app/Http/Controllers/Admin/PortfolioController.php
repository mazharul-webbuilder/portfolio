<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioCreateRequest;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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

    /**
     * Create Portfolio
    */
    public function create(): View
    {
        $portfolioCategories = PortfolioCategory::all();

        return \view('admin.portfolio.create', compact('portfolioCategories'));
    }

    /**
     * Store data
    */
    public function store(PortfolioCreateRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $datas = $request->validated();
            $datas['favorite'] = rand(10, 500);
            unset($datas['image']);
            $portfolio = Portfolio::create($datas);
            if ($request->hasFile('image')) {
                $portfolio->image = store_2_type_image_nd_get_image_name(request: $request, folderName: 'portfolio', resize_width: 800, resize_height: 600);
                $portfolio->save();
            }
            DB::commit();
            return response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Portfolio created successfully'
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return \response()->json([
                'response' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'type' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }
}
