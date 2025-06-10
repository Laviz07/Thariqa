<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::with('user')->latest()->get();

        return view('pages.materi.index', compact('materi'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Materi::with('user')
            ->where('judul', 'like', '%' . $query . '%')
            ->get();

        $html = view('includes.materials', ['materi' => $results])->render();

        return response()->json(['html' => $html]);
    }

    public function show($slug)
    {
        $materi = Materi::with('materi_contents')->where('slug', $slug)->firstOrFail();

        return view('pages.materi.detail', compact(['materi']));
    }
}
