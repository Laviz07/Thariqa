<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $member = User::where('role', 'member')->get();

        return view('pages.about.index', compact('member'));
    }
}
