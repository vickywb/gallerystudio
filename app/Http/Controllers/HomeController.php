<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::take(10)
            ->latest()
            ->get();
            
        return view('frontend.home', [
            'portofolios' => $portofolios
        ]);
    }
}
