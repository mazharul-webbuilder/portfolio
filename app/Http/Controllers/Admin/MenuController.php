<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show Menus
    */
    public function index(): View
    {
        return \view('admin.menu.index');
    }

    /**
     * menus datatable
    */
    public function datatable()
    {
        $query = Menu::query();

        return DataTables::of($query)
            ->addColumn('status', function ($menu){
                return '<select class="form-control w-25 change-status"  data-id="' . $menu->id . '">
                    <option value="1" ' . ($menu->status == 1 ? "selected" : "") . ' class="text-success">&#10003; Active</option>
                    <option value="0" ' . ($menu->status == 0 ? "selected" : "") . ' class="text-danger">&#10007; Deactivate</option>
                </select>';


            })
            ->addColumn('action', function ($menu){
                return '<button type="button"
                 data-toggle="modal"
                 class="menuEditBtn btn btn-primary waves-effect waves-light btn btn-primary"
                 data-id="' . $menu->id . '">Edit</button>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    /**
     * Get Menu
    */
    public function getMenu(Request $request): JsonResponse
    {
        return \response()->json(Menu::find($request->menuId));
    }

    /**
     * Update Menus Status
    */
    public function updateMenuStatus(Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $menu = Menu::find($request->menuId);
            $menu->status = !$menu->status;
            $menu->save();
            DB::commit();
            return response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => "Status Changed Successfully"
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
