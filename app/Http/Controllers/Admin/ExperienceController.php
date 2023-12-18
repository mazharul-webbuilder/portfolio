<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceAddRequest;
use App\Models\Experience;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * show experiences table
    */
    public function index(): View
    {
        return \view('admin.experience.index');
    }

    /**
     * Yajra SSR datatable
     */
    public function datatable(): JsonResponse
    {
        $query = Experience::query()->orderByDesc('id');

        return DataTables::of($query)
            ->addColumn('action', function ($experience){
                return '<div>
                            <a
                            href="'.route('admin.skills.edit', $experience->id).'"
                            class=" btn btn-primary waves-effect waves-light btn btn-primary"
                        >Edit</a>
                             <button type="button"
                            data-toggle="modal"
                            class="experienceDeleteBtn btn btn-danger waves-effect waves-light btn btn-primary"
                            data-id="' . $experience->id . '">Delete</button>
                        </div>
                        ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * show create page
    */
    public function create(): View
    {
        return \view('admin.experience.create');
    }

    /**
     * Post experience
     */
    public function store(ExperienceAddRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $datas = $request->validated();

            Experience::create($datas);

            DB::commit();
            return \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Experiences Added Successfully'
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
