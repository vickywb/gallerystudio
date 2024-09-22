<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\Category;
use App\Models\Portofolio;
use App\Helpers\UploadFile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\FileRepository;
use Illuminate\Support\Facades\Storage;
use App\Repositories\PortofolioRepository;
use App\Http\Requests\PortofolioStoreRequest;
use App\Http\Requests\PortofolioUpdateRequest;

class PortofolioController extends Controller
{
    private $portofolioRepository;
    private $fileRepository;

    public function __construct(
        PortofolioRepository $portofolioRepository,
        FileRepository $fileRepository
    ) 
    {
        $this->portofolioRepository = $portofolioRepository;
        $this->fileRepository = $fileRepository;
    }
    
    public function index()
    {
        $portofolios = $this->portofolioRepository->get([
            'order' => 'title asc',
            'pagination' => 5
        ]);

        return view('admin.portofolio.index', [
            'portofolios' => $portofolios
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.portofolio.create', [
            'categories' => $categories
        ]);
    }

    public function store(PortofolioStoreRequest $request, Portofolio $portofolio)
    {
        //Create variable to store array data
        $listImages = [];

        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        //Store request in variable data
        $data = $request->only([
            'title', 'slug', 'category_id', 'description'
        ]);

        try {
            DB::beginTransaction();

            //Store new data
            $portofolio = new Portofolio($data);
            $portofolio = $this->portofolioRepository->store($portofolio);

            //Checking if a File is Uploaded
            if ($request->hasFile('image')) {
                //Retrieving the Uploaded File
                $file = $request->file('image')->get();

                //Use Helpers
                new UploadFile($file, [
                    'field_name' => 'location',
                    'extension' => $request->file('image')->getClientOriginalExtension(),
                    'location' => 'portofolio/'
                ], $request);

                //Storing information to repository with the key "location"
                $uploadedFile = $this->fileRepository->store($request->only('location'));

                //Store data in array
                $listImages[] = [
                    'file_id' => $uploadedFile->id,
                    'portofolio_id' => $portofolio->id
                ];
            }
            
            //Store data listImages to relation table
            $portofolio->portofolioImages()->createMany($listImages);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('admin.portofolio.index')->with([
            'success' => 'New Portofolio has successfully created.'
        ]);
    }

    public function edit(Portofolio $portofolio)
    {
        $categories = Category::all();

        return view('admin.portofolio.edit', [
            'portofolio' => $portofolio,
            'categories' => $categories
        ]);
    }

    public function update(PortofolioUpdateRequest $request, Portofolio $portofolio)
    {
        //Create variable to store array data
        $listImages = [];

        //Get Unused File according id and location
        $unusedFiles = File::select('id', 'location')
            ->doesntHave('abouts')
            ->doesntHave('portofolioImages')
            ->doesntHave('blogImages')
            ->get();

        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        //Store request in variable data
        $data = $request->only([
            'title', 'slug', 'category_id', 'description'
        ]);

        try {
            DB::beginTransaction();

            //Fill request data and store the data
            $portofolio = $portofolio->fill($data);
            $portofolio = $this->portofolioRepository->store($portofolio);

            //Checking if a File is Uploaded
            if ($request->hasFile('image')) {
                //Retrieving the Uploaded File
                $file = $request->file('image')->get();
            
                //Use Helpers
                new UploadFile($file, [
                    'field_name' => 'location',
                    'extension' => $request->file('image')->getClientOriginalExtension(),
                    'location' => 'portofolio/'
                ], $request);

                //Storing information to repository with the key "location"
                $uploadedFile = $this->fileRepository->store($request->only('location'));

                foreach ($portofolio->portofolioImages as $portofolioImage) {
                    // Retrieve the location of the old file
                    if ($portofolioImage->file_id) {
                        //Store location file in the variable OldFileName
                        $oldFileName = $portofolioImage->file->location;
                    }

                    //Delete the existing file in the storage
                    if (isset($oldFileName)) {
                        Storage::delete($oldFileName);
                    }

                    //Check File is empty or not
                    if (!$unusedFiles->isEmpty()) {
                        //File which not in relation will be execute 
                        foreach ($unusedFiles as $file) {
                            $file->delete();
                        }
                    }
    
                    // Delete the file record from the specific table
                    $file = File::find($portofolioImage->file->id)->delete();
                }

                //Store data in array
                $listImages[] = [
                    'file_id' => $uploadedFile->id,
                    'portofolio_id' => $portofolio->id
                ];
            }

            //Store data listImages to relation table
            $portofolio->portofolioImages()->createMany($listImages);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('admin.portofolio.index')->with([
            'success' => 'Portofolio has successfully updated.'
        ]);
    }

    public function destroy(Portofolio $portofolio)
    {
        //Get Unused File according id and location
        $unusedFiles = File::select('id', 'location')
        ->doesntHave('abouts')
        ->doesntHave('portofolioImages')
        ->doesntHave('blogImages')
        ->get();

        try {
            DB::beginTransaction();

            foreach ($portofolio->portofolioImages as $portofolioImage) {
                //Check file_id
                if (!empty($portofolioImage->file_id)) {

                    // Retrieve the location of the old file
                    if ($portofolioImage->file_id) {
                        //Store location file in the variable OldFileName
                        $oldFileName = $portofolioImage->file->location;
                    }
    
                    //Delete the existing file in the storage
                    if (isset($oldFileName)) {
                        Storage::delete($oldFileName);
                    }

                    //Check File is empty or not
                    if (!$unusedFiles->isEmpty()) {
                        //File which not in relation will be execute 
                        foreach ($unusedFiles as $file) {
                            $file->delete();
                        }
                    }
    
                    // Delete the file record from the specific table
                    $file = File::find($portofolioImage->file->id)->delete();
                }
            }

            //Delete a record from a specific table
            $portofolio->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('admin.portofolio.index')->with([
            'success' => 'Portofolio has been deleted.'
        ]);
    }
}