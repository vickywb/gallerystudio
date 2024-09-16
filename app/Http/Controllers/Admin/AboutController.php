<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\FileRepository;
use App\Repositories\AboutRepository;
use App\Http\Requests\AboutStoreRequest;
use App\Http\Requests\AboutUpdateRequest;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    private $aboutRepository;
    private $fileRepository;

    public function __construct(
        AboutRepository $aboutRepository,
        FileRepository $fileRepository
    ) 
    {
        $this->aboutRepository = $aboutRepository;
        $this->fileRepository = $fileRepository;
    }

    public function index(About $about)
    {
        $abouts = $this->aboutRepository->get([
            'order' => 'title desc'
        ]);

        return view('admin.about.index', [
            'abouts' => $abouts
        ]);
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(AboutStoreRequest $request, About $about)
    {
        //Checking if a File is Uploaded
        if ($request->hasFile('image')) {
            //Retrieving the Uploaded File
            $file = $request->file('image')->get();

            //Helpers check
            new UploadFile($file, [
                'field_name' => 'location',
                'extension' => $request->file('image')->getClientOriginalExtension(),
                'location' => 'about/'
            ], $request);

            //Storing information to repository with the key "location"
            $uploadedFile = $this->fileRepository->store($request->only('location'));

            //Merger the file id into the request
            $request->merge([
                'file_id' => $uploadedFile->id
            ]);
        }

        //Store request in variable data
        $data = $request->only([
            'title', 'description', 'image', 'file_id'
        ]);

        try {
            DB::beginTransaction();
            
            //Store new data
            $about = new About($data);
            $about = $this->aboutRepository->store($about);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('admin.about.index')->with([
            'success' => 'New About has been successfully created.'
        ]);
    }

    public function edit(About $about)
    {
        return view('admin.about.edit', [
            'about' => $about
        ]);
    }

    public function update(AboutUpdateRequest $request, About $about)
    {
        //Get Unused File according id and location
        $unusedFiles = File::select('id', 'location')
        ->doesntHave('abouts')
        ->doesntHave('portofolioImages')
        ->doesntHave('blogImages')
        ->get();

        //Checking if a File is Uploaded
        if ($request->hasFile('image')) {
            //Retrieving the Uploaded File
            $file = $request->file('image')->get();

            //Helpers check
            new UploadFile($file, [
                'field_name' => 'location',
                'extension' => $request->file('image')->getClientOriginalExtension(),
                'location' => 'about/'
            ], $request);

            //Storing information to repository with the key "location"
            $uploadedFile = $this->fileRepository->store($request->only('location'));
       
            //Merger the file id into the request
            $request->merge([
                'file_id' => $uploadedFile->id
            ]);

            //Check file id is exist
            if ($about->file_id) {
                //Create variable to store the key
                $oldFileName = $about->file->location;
            }

            //Check File is empty or not
            if (!$unusedFiles->isEmpty()) {
                //File which not in relation will be execute 
                foreach ($unusedFiles as $file) {
                    $file->delete();
                }
            }
        }

        //Store request in variable data
        $data = $request->only([
            'title', 'description', 'file', 'file_id'
        ]);

        try {
            DB::beginTransaction();
            
            //Store data from variable data
            $about = $about->fill($data);
            $about = $this->aboutRepository->store($about);

            //Checked if variable oldfilename isn't null
            if (isset($oldFileName)) {
                //delete file from filesystem
                Storage::delete($oldFileName);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('admin.about.index')->with([
            'success' => 'About has been successfully updated.'
        ]);
    }

    public function destroy(About $about)
    {
        try {
            DB::beginTransaction();

            //Check is file_id exist
            if (!empty($about->file_id)) {
                
                // Retrieve the location of the old file
                if ($about->file_id) {
                    $oldFileName = $about->file->location;
                }

                //Delete the existing file in the storage
                if (isset($oldFileName)) {
                    Storage::delete($oldFileName);
                }

                // Delete the file record from the database
                $file = File::find($about->file->id)->delete();
            }
            
            //Remove record from a table 
            $about->delete();

            DB::commit();

        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('admin.about.index')->with([
            'success' => 'About has been successfully deleted.'
        ]);
    }
}
