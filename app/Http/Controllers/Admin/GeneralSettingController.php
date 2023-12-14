<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralSettingUpdateRequest;
use App\Models\AdminDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class GeneralSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show General Setting Page
    */
    public function index(): View
    {
        $adminDetails = AdminDetail::first();

        return \view('admin.setting.general-setting', compact('adminDetails'));
    }

    /**
     * Update General Setting
    */
    public function updateGeneralSetting(GeneralSettingUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->except('image');

            $adminDetail = AdminDetail::first();
            $adminDetail->update($data);

            if ($request->hasFile('image')) {
                if (!is_null($adminDetail->avatar)) {
                    delete_2_type_image_if_exist_latest(imageName: $adminDetail->avatar, folderName: 'admin-avatar');
                }
                $adminDetail->avatar = store_2_type_image_nd_get_image_name(request: $request, folderName:  'admin-avatar', resize_width: 256, resize_height: 200);
            }
            $adminDetail->save();

            DB::commit();
            return \response()->json([
                'response' => Response::HTTP_OK,
                'type' => 'success',
                'message' => 'General Setting Updated Successfully'
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
