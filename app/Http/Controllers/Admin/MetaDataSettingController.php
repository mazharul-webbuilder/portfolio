<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MetaSettingUpdateRequest;
use App\Models\Meta;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class MetaDataSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Admin Meta Data Setting Page
    */
    public function index(): View
    {
        $metaSetting = Meta::first();

        return \view('admin.setting.meta-data', compact('metaSetting'));
    }

    /**
     * Update Meta setting
    */
    public function updateMetaSetting(MetaSettingUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $datas = $request->validated();

            $metaSetting = Meta::first();

            $metaSetting->update([
                'company_name' => $datas['company_name'],
                'designation' => $datas['designation'],
                'short_description' => $datas['short_description'],
                'email' => $datas['email'],
                'phone' => $datas['phone'],
            ]);
            if ($request->hasFile('company_logo')) {

            }
            if ($request->hasFile('site_banner')) {

            }

            DB::commit();
            return response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'Meta Data Updated Successfully'
            ]);
        } catch (QueryException $e) {
            DB::rollBack();
            return response()->json([
                'response' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'type' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
