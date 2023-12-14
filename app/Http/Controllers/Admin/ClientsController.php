<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show happy Clients
    */
    public function index(): View
    {
        return \view('admin.client.index');
    }

    /**
     * Clients datatable
     */
    public function datatable(): JsonResponse
    {
        $query = Client::query()->orderByDesc('id');

        return DataTables::of($query)
            ->addColumn('image', function ($menu) {
                return '<img src="' . asset('uploads/client/resize' . '/' . $menu->image) . '" alt="client image" height="50" width="50">';
            })
            ->addColumn('action', function ($menu){
                return '<button type="button"
                 data-toggle="modal"
                 class="menuDeleteBtn btn btn-danger waves-effect waves-light btn btn-primary"
                 data-id="' . $menu->id . '">Delete</button>';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }
}
