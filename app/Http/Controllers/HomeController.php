<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'user' => User::all(),
            'member' => User::where('role', 'member')->get(),
            'materi' => Materi::latest()->take(6)->get()
        ];
        return view('pages.home.index', $data);
    }
}
