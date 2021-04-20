<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class FileController extends Controller
{
    public function upload(Request $request) {
        $validator = Validator::make($request->all(),
            [
            'file' => 'required|mimes:png,jpg,jpeg|max:8192',
            ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        if ($files = $request->file('file')) {

            //store file into document folder
            $file = Storage::disk('myDisk')->put('/images', $request->file);

            // Create Thumbnail image
            $img = Image::make(Storage::disk('myDisk')->path($file));
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name = explode('/', $file);
            $filename = implode('/', [$name[0], 'thumb_' . $name[1]]);
            $path = Storage::disk('myDisk')->path($filename);
            $img->save($path);

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "url" => Storage::url($file),
                "file" => $file
            ]);

        }
    }

    public function return_file(Request $request, $file) {
        //This method will look for the file and get it from drive
        $path = storage_path('app/Uploads/images/' . $file);
        try {
            $file = File::get($path);
            $type = File::mimeType($path);
            $response = response($file);
            $response->header("Content-Type", $type);
            return $response;
        } catch (FileNotFoundException $exception) {
            abort(404);
        }
    }

}
