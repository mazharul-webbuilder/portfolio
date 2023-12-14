<?php

use App\Models\Admin;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;



/**
 * get admin user
 */
if (!function_exists('getAdmin')) {
    function getAdmin()
    {
        return Admin::first();
    }
}


/*store original and resize image*/
if (!function_exists('store_2_type_image_nd_get_image_name')) {
    function store_2_type_image_nd_get_image_name($request, $folderName, $resize_width = 256, $resize_height = 200): ?string
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = strtolower(Str::random(10)) . time() . "." . $image->getClientOriginalExtension();

            $original_directory = "uploads/{$folderName}/original";
            $resize_directory = "uploads/{$folderName}/resize";

            if (!File::exists(public_path($original_directory))) {
                File::makeDirectory(public_path($original_directory), 0777, true);
                File::makeDirectory(public_path($resize_directory), 0777, true);
            }
            $original_image_path = public_path("{$original_directory}/{$image_name}");
            $resize_large_path = public_path("{$resize_directory}/{$image_name}");

            Image::make($image)->save($original_image_path);
            Image::make($image)->resize($resize_width, $resize_height)->save($resize_large_path);

            return $image_name;
        }

        return null;
    }
}

/**
 * Delete Origin and Resize Image If Exist Latest
 */
if (!function_exists('delete_2_type_image_if_exist_latest')) {
    function delete_2_type_image_if_exist_latest($imageName, $folderName): void
    {
        $original_image_path = "uploads/{$folderName}/original/{$imageName}";
        $resize_image_path = "uploads/{$folderName}/resize/{$imageName}";

        if (File::exists(public_path($original_image_path))) {
            // Set permissions before deleting (e.g., set to 0644)
            File::chmod(public_path($original_image_path), 0644);
            File::chmod(public_path($resize_image_path), 0644);

            // Delete the files
            File::delete(public_path($original_image_path));
            File::delete(public_path($resize_image_path));
        }
    }
}
