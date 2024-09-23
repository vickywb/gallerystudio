<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::with('category')->get();
        return view('frontend.portofolio', [
            'portofolios' => $portofolios
        ]);
    }
}
