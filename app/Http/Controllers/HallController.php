<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\book;
use App\Models\Category;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function index()
    {
        $title = 'hall';
        $books = book::all();
        
        // return dd($books);
        return view('hall', compact('title', 'books'));
    }
    public function singlebook($slug) {
        $book = book::where('slug', $slug)->first();
        $title = $book->name;
        return dd($book);
    }

    public function getByCategory(Category $category) {
        $books = book::where('category_id', $category->id)->get();
        $title = 'Books of ' . $category->name;

        return view('hall', compact('title', 'books'));
    }

    public function getByAuthor(Author $author) {
        $books = book::where('author_id', $author->id)->get();
        $title = 'Books by ' . $author->name;

        return view('hall', compact('title', 'books'));
    }
}


