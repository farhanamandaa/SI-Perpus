<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\Borrow;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.content');
    }

    public function show()
    {
        $books = Book::all();
        return view('user.listbook', compact('books'));
    }

    public function showDetails(Book $book)
    {
        return view('user.booksdetail', compact('book'));
    }

    public function borrowList()
    {   
        $user_id        =   auth()->user()->id;
        $userData       =   User::find($user_id);
        $borrowinglist  =   $userData->borrow;
        $bookBorrowed   =   $userData->book;
        // dd($borrowinglist);
        return view('user.borrowinglist', compact(['borrowinglist','bookBorrowed']));
    }
}
