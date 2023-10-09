<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsvUploadController extends Controller
{

    public function upload(Request $request)
    {
        if ($request->hasFile('csvFile')) {
            $file = $request->file('csvFile');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('csv'), $fileName);

            return response()->json(['message' => 'File uploaded successfully']);
        }

        return response()->json(['message' => 'File not found'], 400);
    }
    //
}
