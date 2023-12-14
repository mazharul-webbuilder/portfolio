<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MetaSettingUpdateRequest;
use App\Models\Meta;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

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

            /*Update Info's except images*/
            $metaSetting->update([
                'company_name' => $datas['company_name'],
                'designation' => $datas['designation'],
                'short_description' => $datas['short_description'],
                'email' => $datas['email'],
                'phone' => $datas['phone'],
            ]);
            /*Store Company Logo*/
            if ($request->hasFile('image')) {
                if (!is_null($metaSetting->company_logo)) {
                    delete_2_type_image_if_exist_latest(imageName: $metaSetting->company_logo, folderName: 'company');
                }
                $companyLogoName = store_2_type_image_nd_get_image_name(request: $request, folderName: 'company', resize_width: 460, resize_height: 288);
                $metaSetting->company_logo = $companyLogoName;
            }
            /*Store Site Banner*/
            if ($request->hasFile('site_banner')) {
                if (!is_null($metaSetting->site_banner)) {
                    delete_2_type_image_if_exist_latest(imageName: $metaSetting->site_banner, folderName: 'banner');
                }
                $image = $request->file('site_banner');
                $image_name = strtolower(Str::random(10)) . time() . "." . $image->getClientOriginalExtension();

                $original_directory = "uploads/banner/original";
                $resize_directory = "uploads/banner/resize";

                $original_image_path = public_path("{$original_directory}/{$image_name}");
                $resize_large_path = public_path("{$resize_directory}/{$image_name}");

                Image::make($image)->save($original_image_path);
                Image::make($image)->resize(700, 960)->save($resize_large_path);

                $metaSetting->site_banner = $image_name;
            }
            $metaSetting->save();
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
