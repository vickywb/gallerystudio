<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $portofolios = Portofolio::all();
        
        return view('frontend.portofolio', [
            'portofolios' => $portofolios,
            'categories' => $categories
        ]);
    }
}
