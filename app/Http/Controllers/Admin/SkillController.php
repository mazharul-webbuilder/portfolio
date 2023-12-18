<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProffessionalSkill;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
            ->rawColumns(['action'])
            ->make(true);
    }
}
