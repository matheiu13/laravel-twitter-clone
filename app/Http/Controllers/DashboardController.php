<?php

namespace App\Http\Controllers;

use App\Models\Yap;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard', ['yaps' => Yap::orderBy('created_at', 'DESC')->paginate(5)]);
    }
}
