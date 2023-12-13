<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
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
                return '<select class="form-control w-25">
                    <option value="1" ' . ($menu->status == 1 ? "selected" : "") . ' class="text-success">&#10003; Active</option>
                    <option value="0" ' . ($menu->status == 0 ? "selected" : "") . ' class="text-danger">&#10007; Deactivated</option>
                </select>';


            })
            ->addColumn('action', function ($menu){
                return '<button class="btn btn-primary" data-id="' . $menu->id . '">Edit</button>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
}
