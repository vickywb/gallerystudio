<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class UploadedFile
{
    public function __construct($file, array $params = [], $request)
    {
        $extension = !empty($params['extension']) ? $params['extension'] : 'txt';

        $fileName = Str::random(16);

        //Define the path by which we will store the image
        $fullFileName = 'file' . '/' . $fileName . '.' . 'extension';
        if (isset($params['location'])) {
            $fullFileName = 'file' . '/' . $params['location'] . $fileName . '.' . $extension;
        }

        //Store file in the public storage
        Storage::put($fullFileName, (string)$file, 'public');

        //Merge the filename column to request
        $request->merge([
            $params['field_name'] => $fullFileName
        ]);

        //Merge Filename
        if (isset($params['filename'])) {
            $request->merge([
                'filename' => $request->name . '.' . $fileName . '.' . $extension
            ]);
        }
    }
}