<?php

namespace App\Http\Controllers;

use App\Models\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class FileController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                return $this->response(400,['errors' => $validator->errors()], "Error Validation");
            }

            // Get the uploaded file
            $uploadedFile = $request->file('file');

            $extension = $uploadedFile->getClientOriginalExtension();
            $randomString = Str::random(10); // Adjust the length as needed

            // Generate a unique name for the file
            $fileName = time() . '_' . $randomString . '.' . $extension;


            // Store the file in the storage/app/public directory
            $path = $uploadedFile->storeAs('public', $fileName);

            // Save file details in the database
            $file = File::create([
                'file_name' => $fileName,
                'path' => $path,
                'user_id' => auth()->user()->id ?? null, // Assuming user is authenticated
            ]);

            return $this->response(200,['file' => $file],"File uploaded successfully");
        } catch (Exception $e) {
            return $this->response(500,['error' => $e->getMessage()],"Something want wrong.");
        }
    }

    public function show($id)
    {

        $validator = Validator::make(['id' => $id], [
            'id' => [
                   'required',
                    Rule::exists('files')->where(function ($query) {
                                $query->whereNull('deleted_at');
                    }),
                ],
        ]);

        if ($validator->fails()) {
            return $this->response(400, ['errors' => $validator->errors()], "Error Validation");
        }

        $file = File::findOrFail($id);

        // Get the full path to the stored file
        $fullPath = Storage::url($file->path);

        return $this->response(200,['full_path' => $fullPath,"file" => $file], "File Data fetch Successfully");
    }

    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|exists:files,id',
        ]);

        if ($validator->fails()) {
            return $this->response(400, ['errors' => $validator->errors()], "Error Validation");
        }

        $file = File::findOrFail($id);

        // Delete the file from storage
        Storage::delete($file->path);

        // Delete the file record from the database
        $file->delete();

        return $this->response(200, [], "File deleted successfully");
    }
}
