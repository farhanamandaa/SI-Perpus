<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Book;
use App\Borrow;
use App\Returning;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
    	$this->middleware('admin');
    }

    public function index()
    {
    	$user 	= User::count();
    	$book 	= Book::count();
    	$borrow	= Borrow::count();
    	$returned = Returning::count();
        $monthName  = DB::table('borrows_log')
                    ->select(DB::raw('DISTINCT monthname(borrow_date) as name'))
                    ->orderByRaw('MONTHNAME(borrow_date) DESC')
                    ->get();

        foreach ($monthName as $names) 
        {
            $name[]= $names->name;
        }

        $monthCount = DB::table('borrows_log')
                    ->select(DB::raw('count(month(borrow_date)) as counting'))
                    ->groupBy(DB::raw('MONTH(borrow_date)'))
                    ->get();
        foreach ($monthCount as $counts) 
        {
            $count[]= $counts->counting;
        }

        return view('admin.content',compact(['user','book','borrow','returned','name','count']));

    }
}
