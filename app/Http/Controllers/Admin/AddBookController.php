<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AddBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $books      = Book::all();
        return view('admin.addbook', compact(['categories','books']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        $category_id    =   request('category_id');

        $validatedData  =   $request->validate([
            'title'     =>  'required',
            'author'    =>  'required',
            'publisher' =>  'required',
            'year'      =>  'required',
            'pages'     =>  'required',
            'quantity'  =>  'required',
            'images'    =>  'required|mimes:jpeg,bmp,png',
            'category_id'=> 'required',
        ]);
        // dd($validatedData);
        
        if ($request->hasFile('images'))
        {
            $image          =   Input::file('images');
            $image->move('storage/books', $image->getClientOriginalName());
        }
        $storeData      =   Book::create([
            'title'     =>  request('title'),
            'author'    =>  request('author'),
            'publisher' =>  request('publisher'),
            'year'      =>  request('year'),
            'pages'     =>  request('pages'),
            'quantity'  =>  request('quantity'),
            'images'    =>  $image->getClientOriginalName(),
            'category_id' => $category_id,

        ]);

        session()->flash('message','Berhasil menambahkan buku');
        return redirect(route('admin.book'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
