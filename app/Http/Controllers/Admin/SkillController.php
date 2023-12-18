<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProffessionalSkill;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class SkillController extends Controller
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
        return \view('admin.skill.index');
    }

    /**
     * Yajra SSR datatable
     */
    public function datatable(): JsonResponse
    {
        $query = ProffessionalSkill::query()->orderByDesc('id');

        return DataTables::of($query)
            ->addColumn('action', function ($skill){
                return '<div>
                            <a
                            href="'.route('admin.education.edit', $skill->id).'"
                            class=" btn btn-primary waves-effect waves-light btn btn-primary"
                        >Edit</a>
                             <button type="button"
                            data-toggle="modal"
                            class="skillDeleteBtn btn btn-danger waves-effect waves-light btn btn-primary"
                            data-id="' . $skill->id . '">Delete</button>
                        </div>
                        ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show skill create page
    */
    public function create(): View
    {
        return \view('admin.skill.create');
    }

    /**
     * Post new blog
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|min:2',
            'value' => 'required|numeric|max:100'
        ]);

        try {
            DB::beginTransaction();

            $datas = $request->except('_token');

            ProffessionalSkill::create($datas);

            DB::commit();
            return \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Skill Added Successfully'
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
            $client = ProffessionalSkill::find($request->id);
            $client->delete();
            DB::commit();
            return  \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Professional Skill Deleted Successfully'
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
