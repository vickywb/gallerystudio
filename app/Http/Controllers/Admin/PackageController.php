<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\PackageRepository;
use App\Http\Requests\PackageStoreRequest;
use App\Http\Requests\PackageUpdateRequest;

class PackageController extends Controller
{
    private $packageRepository;

    public function __construct(PackageRepository $packageRepository) 
    {
        $this->packageRepository = $packageRepository;
    }
    
    public function index()
    {
        $packages = $this->packageRepository->get([
            'order' => 'title desc'
        ]);

        return view('admin.package.index', [
            'packages' => $packages
        ]);
    }

    public function create()
    {
        return view('admin.package.create');
    }

    public function store(PackageStoreRequest $request, Package $package)
    {
      //Merger the file id into the request
      $request->merge([
        'slug' => Str::slug($request->title)
      ]);

      //Store request in variable data
      $data = $request->only([
        'title', 'slug', 'price', 'description'
      ]);

      try {
        DB::beginTransaction();
        
        //Store new data
        $package = new Package($data);
        $package = $this->packageRepository->store($package);

        DB::commit();
      } catch (\Throwable $th) {
        DB::rollback();

        return redirect()->back()->withErrors([
            'errors' => $th->getMessage()
        ]);
      }

      return to_route('admin.package.index')->with([
        'success' => 'New Package has been successfully created.'
      ]);
    }

    public function edit(Package $package)
    {
        return view('admin.package.edit', [
            'package' => $package
        ]);
    }

    public function update(PackageUpdateRequest $request, Package $package)
    {
        $request->merge([
          'slug' => Str::slug($request->title)
        ]);
  
        //Store request in variable data
        $data = $request->only([
          'title', 'slug', 'price', 'description'
        ]);
  
        try {
          DB::beginTransaction();
          
          //Store new data
          $package =  $package->fill($data);
          $package = $this->packageRepository->store($package);
  
          DB::commit();
        } catch (\Throwable $th) {
          DB::rollback();
  
          return redirect()->back()->withErrors([
              'errors' => $th->getMessage()
          ]);
        }
  
        return to_route('admin.package.index')->with([
          'success' => 'Package has successfully updated.'
        ]);
    }

    public function destroy(Package $package)
    {
        try {
          DB::beginTransaction();
          
          //Delete a record from a specific table
          $package->delete();

          DB::commit();
        } catch (\Throwable $th) {
          DB::rollBack();

          return redirect()->back()->withErrors([
            'errors' => $th->getMessage()
          ]);
        }
  
        return to_route('admin.package.index')->with([
          'success' => 'Package has been successfully deleted.'
        ]);
    }
}
