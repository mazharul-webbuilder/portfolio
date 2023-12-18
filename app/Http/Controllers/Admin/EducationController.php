<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationCreateRequest;
use App\Models\Education;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class EducationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show table
    */
    public function index(): View
    {
        return \view('admin.education.index');
    }

    /**
     * Yajra SSR datatable
     */
    public function datatable(): JsonResponse
    {
        $query = Education::query()->orderByDesc('id');

        return DataTables::of($query)
            ->addColumn('action', function ($education){
                return '<div>
                            <a
                            href="'.route('admin.education.edit', $education->id).'"
                            class=" btn btn-primary waves-effect waves-light btn btn-primary"
                        >Edit</a>
                             <button type="button"
                            data-toggle="modal"
                            class="educationDeleteBtn btn btn-danger waves-effect waves-light btn btn-primary"
                            data-id="' . $education->id . '">Delete</button>
                        </div>
                        ';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    /**
     * Show education qualification create page
    */
    public function create(): View
    {
        return \view('admin.education.create');
    }

    /**
     * Post new blog
     */
    public function store(EducationCreateRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $datas = $request->validated();

            Education::create($datas);

            DB::commit();
            return \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Education Qualification Added Successfully'
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
     * Edit Education
    */
    public function edit(Education $education) : View
    {
        return \view('admin.education.edit', compact('education'));
    }

    /**
     * Update  Data
     */
    public function update(EducationCreateRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $education = Education::find($request->id);

            $datas = $request->validated();

            $education->update($datas);

            DB::commit();
            return \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Education Qualification Updated Successfully'
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
            $client = Education::find($request->id);
            $client->delete();
            DB::commit();
            return  \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Education Qualification Deleted Successfully'
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
