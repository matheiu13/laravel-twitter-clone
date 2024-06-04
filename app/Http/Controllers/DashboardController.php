<?php

namespace App\Http\Controllers;

use App\Models\Yap;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $yaps = Yap::orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            $yaps = $yaps->where('yap', 'like', '%' . request()->get('search', '') . '%');
        }
        return view('dashboard', ['yaps' => $yaps->paginate(5)]);
    }
}
