<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Homepage';
        $books = book::latest('published_at')->take(3)->get();

        $color = [
            'bg-sky-100 text-sky-500',
            'bg-yellow-100 text-yellow-500',
            'bg-green-100 text-green-500',
            'bg-red-100 text-red-500',
            'bg-indigo-100 text-indigo-500',
            'bg-amber-100 text-amber-500',
            'bg-cyan-100 text-cyan-500',
            'bg-purple-100 text-purple-500',
            'bg-rose-100 text-rose-500',

        ];

        foreach ($books as $book) {
            $categoryId = $book->category_id;
            $colorIndex = $categoryId % count($color);
            $book->category_color = $color[$colorIndex];
        }

        return view('homepage', compact('title', 'books'));
    }
}
