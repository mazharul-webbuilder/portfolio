<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientCreateRequest;
use App\Http\Requests\ClientUpdateReqeust;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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
                return '<div>
                            <button type="button"
                            data-toggle="modal"
                            class="ClientEditBtn btn btn-primary waves-effect waves-light btn btn-primary"
                            data-id="' . $menu->id . '">Edit</button>
                             <button type="button"
                            data-toggle="modal"
                            class="ClientDeleteBtn btn btn-danger waves-effect waves-light btn btn-primary"
                            data-id="' . $menu->id . '">Delete</button>
                        </div>
                        ';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    /**
     * Create Client page show
    */
    public function create(): View
    {
        return \view('admin.client.create');
    }

    /**
     * Store New Client
    */
    public function store(ClientCreateRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $datas = $request->except('image', '_token');

            $datas['client_category_id'] = 1;

            $client = Client::create($datas);


            if ($request->hasFile('image')) {
                $client->image = store_2_type_image_nd_get_image_name(request: $request, folderName: 'client');
                $client->save();
            }

            DB::commit();
            return \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Client Created Successfully'
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

    /**
     * Get Client
    */
    public function getClient(Request $request): JsonResponse
    {
        return \response()->json(Client::find($request->id));
    }

    /**
     * Update Client Data
    */
    public function update(ClientUpdateReqeust $reqeust): JsonResponse
    {
        try {
            DB::beginTransaction();
            $client = Client::find($reqeust->id);
            $client->name = $reqeust->name;
            if ($reqeust->hasFile('image')) {
                if (!is_null($client->image)) {
                    delete_2_type_image_if_exist_latest(imageName: $client->image, folderName: 'client');
                }
                $client->image = store_2_type_image_nd_get_image_name(request: $reqeust, folderName: 'client');
            }
            $client->save();
            DB::commit();
            return \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Client Info Updated Successfully'
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
     * Delete Clients
    */
    public function delete(Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $client = Client::find($request->id);
            $client->delete();
            DB::commit();
            return  \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Client Deleted Successfully'
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
