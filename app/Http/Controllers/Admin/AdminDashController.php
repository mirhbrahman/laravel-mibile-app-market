<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashController extends Controller
{
    public function index()
    {
        return view('admin.dash.index');
    }
}
