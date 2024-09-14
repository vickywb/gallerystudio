<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\error;

class UploadFile
{
    public function __construct($file, array $params = [], $request)
    {   
        // Determine file extension
        $extension = !empty($params['extension']) ? $params['extension'] : 'txt';

        // Generate a random file name
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

        // Merge Filename with additional details
        if (isset($params['filename'])) {
            $request->merge([
                'filename' => $request->name . '_' . $fileName . '.' . $extension
            ]);
        }
    }
}