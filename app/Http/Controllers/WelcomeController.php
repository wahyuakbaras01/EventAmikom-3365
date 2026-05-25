<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Show the homepage with partners data.
     */
    public function index()
    {
        $partners = Partner::latest()->get();
        $categories = Category::latest()->get();

        return view('welcome', compact('partners', 'categories'));
    }
}
