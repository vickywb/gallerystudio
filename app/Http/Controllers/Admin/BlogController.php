<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\File;
use App\Helpers\UploadFile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\BlogRepository;
use App\Repositories\FileRepository;
use App\Http\Requests\BlogStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BlogUpdateRequest;

class BlogController extends Controller
{
    private $blogRepository;
    private $fileRepository;

    public function __construct(
        BlogRepository $blogRepository,
        FileRepository $fileRepository    
    ) 
    {
        $this->blogRepository = $blogRepository;
        $this->fileRepository = $fileRepository;
    }
    
    public function index()
    {
        $blogs = $this->blogRepository->get([
            'order' => 'title desc'
        ]);

        return view('admin.blog.index', [
            'blogs' => $blogs
        ]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(BlogStoreRequest $request, Blog $blog)
    {
        $listImages = [];

        //Merger the file id into the request
        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        //Store request in variable data
        $data = $request->only([
            'title', 'slug', 'description'
        ]);

        try {
            DB::beginTransaction();

            $blog = new Blog($data);
            $blog = $this->blogRepository->store($blog);

            if ($request->hasFile('images')) {
                foreach ($request->images as $image) {
                    
                    new UploadFile($image->get(), [
                        'field_name' => 'location',
                        'extension' => $image->getClientOriginalExtension(),
                        'location' => 'blog/'
                    ], $request);
                }

                $uploadedFile = $this->fileRepository->store($request->only('location'));

                $listImages[] = [
                    'file_id' => $uploadedFile->id,
                    'blog_id' => $blog->id
                ];
            }

            $blog->blogImages()->createMany($listImages);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('admin.blog.index')->with([
            'success' => 'New Blog has been successfully created.'
        ]);
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', [
            'blog' => $blog
        ]);
    }

    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $listImages = [];

        $unusedFiles = File::select('id', 'location')
            ->doesntHave('abouts')
            ->doesntHave('portofolioImages')
            ->doesntHave('blogImages')
            ->get();

        //Merger the file id into the request
        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        //Store request in variable data
        $data = $request->only([
            'title', 'slug', 'description'
        ]);
        try {
            DB::beginTransaction();

            $blog = $blog->fill($data);
            $blog = $this->blogRepository->store($blog);

            if ($request->hasFile('images')) {
                foreach ($request->images as $image) {
                    
                    new UploadFile($image->get(), [
                        'field_name' => 'location',
                        'extension' => $image->getClientOriginalExtension(),
                        'location' => 'blog/'
                    ], $request);

                    $uploadedFile = $this->fileRepository->store($request->only('location'));

                    if ($blog->blogImages->file_id) {
                        $oldFileName = $blog->blogImages->file->location;
                    }

                      //Check File is empty or not
                    if (!$unusedFiles->isEmpty()) {
                        //File which not in relation will be execute 
                        foreach ($unusedFiles as $file) {
                            $file->delete();
                        }
                    }

                    $listImages[] = [
                        'file_id' => $uploadedFile->id,
                        'blog_id' => $blog->id
                    ];
                }
            }

            $blog->blogImages()->createMany($listImages);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('admin.blog.index')->with([
            'success' => 'Blog has been successfully updated.'
        ]);
    }

    public function destroy(Blog $blog)
    {
        try {
            DB::beginTransaction();

            if (!empty($blog->blogImages->file_id)) {
                
                // Retrieve the location of the old file
                if ($blog->blogImages->file_id) {
                    $oldFileName = $blog->blogImages->file->location;
                }

                //Delete the existing file in the storage
                if (isset($oldFileName)) {
                    Storage::delete($oldFileName);
                }

                // Delete the file record from the specific table
                $file = File::find($blog->blogImages->file->id)->delete();
            }

            //Delete a record from a specific table
            $blog->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('admin.blog.index')->with([
            'success' => 'Blog has been successfully deleted.'
        ]);
    }
}
