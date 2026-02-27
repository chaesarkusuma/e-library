<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\book;
use App\Models\Category;

class HallController extends Controller
{
    public function index()
    {
        $title = '';

        if (request('category')) {
            $category = Category::where('slug', request('category'))->first();
            $title = 'of ' . $category->name;
        }
        if (request('author')) {
            $author = Author::where('slug', request('author'))->first();
            $title = 'by ' . $author->name;
        }

        $title = 'hall ' . $title;

        $books = book::latest()
            ->search(request()
            ->only(['search', 'category', 'author']))
            ->paginate(10)
            ->withQueryString();
        
        return view('hall', compact('title', 'books'));
    }
    public function singlebook(book $book) {
        $title = $book->name;
        return view('book', compact('title', 'book'));
    }


}


