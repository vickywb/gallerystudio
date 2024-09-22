<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository) 
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->get([
            'order' => 'title desc',
            'pagination' => 5
        ]);

        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryStoreRequest $request, Category $category)
    {
        //Merger the file id into the request
        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        //Store request in variable data
        $data = $request->only('title', 'slug');
        
        try {
            DB::beginTransaction();
            
            //Store new data 
            $category = new Category($data);
            $category = $this->categoryRepository->store($category);
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('admin.category.index')->with([
            'success' => 'New Category has been successfully created.'
        ]);
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        //Merger the file id into the request
        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        //Store request in variable data
        $data = $request->only([
            'title', 'slug'
        ]);

        try {
            DB::beginTransaction();
            //Store data from variable data
            $category = $category->fill($data);
            $category = $this->categoryRepository->store($category);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('admin.category.index')->with([
            'success' => 'Category has been successfully updated.'
        ]);
    }

    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction();
            
            //Delete a record from a specific table
            $category->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('admin.category.index')->with([
            'success' => 'Category has been successfully deleted.'
        ]);
    }
}
