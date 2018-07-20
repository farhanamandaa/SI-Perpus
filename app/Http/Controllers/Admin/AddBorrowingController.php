<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Book;
use App\Borrow;
use App\Returning;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddBorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrows =   Borrow::all();
        // foreach ($borrows as $borrow) {
        //     return $borrow->user;
        // }
        return view('admin.borrowinglist',compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members    =   User::where('role_id',2)->get();
        $books      =   Book::all();
        // return $members;  
        return view('admin.addborrowing',compact(['members','books']));
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
        $book_id        =   request('book_id');
        $user_id        =   request('user_id');
        $validatedData  =   $request->validate([
            'user_id'       =>   'required',
            'book_id'       =>   'required',
            'quantity'      =>   'required',
            'borrow_date'   =>   'required',
            'return_date'   =>   'required',   
        ]);

        $borrowing          =   Borrow::create(request(['quantity','borrow_date','return_date']));
        $borrow             =   Borrow::latest()->first();
        $borrow->book()->attach($book_id, ['user_id' => $user_id]);

        return redirect('admin/borrowing_list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $returned           =   Borrow::where('id',$id)->pluck('return_date');
        // var_dump($borrowed);
        foreach ($returned as $return) 
        {
            $return_date    = new Carbon($return);
        }

        // var_dump($tes);

        // var_dump($borr);
        $current_date       =   Carbon::now();
        if ($current_date->lessThanOrEqualTo($return_date) === TRUE) 
        {
            $fine   =   0;
        }
        else{
            $date_difference          = $current_date->diffInDays($return_date,false);
            $fine                     = abs($date_difference * 500); 
        }
        $storeData          =   Returning::create([
            'return_deadline'   =>  $return,
            'return_date'       =>  Carbon::now(),
            'fine'              =>  $fine,
            'borrow_id'         =>  $id,
        ]);
        session()->flash('message','Buku telah dikembalikan, denda sebesar :'.$fine);
        return redirect(route('admin.returning.list'));   
        // return $fine;
        // $dt1= Carbon::createMidnightDate(2018,7,1);
        // var_dump($dt1);
        // $dt2=Carbon::createMidnightDate(2018,7,2);
        // var_dump($borr->lessThanOrEqualTo($dt2));
        // var_dump($tes->lessThanOrEqualTo($dt1));
    }
    public function showReturn()
    {
        $return_list    =  DB::table('book_borrow')
                        ->select('name','title','return_date','fine')
                        ->leftJoin('users','book_borrow.user_id','=','users.id')
                        ->leftJoin('books','book_borrow.book_id','=','books.id')
                        ->leftJoin('returning','book_borrow.borrow_id','=','returning.borrow_id')
                        ->get();
        // return $return_list;                
        return view('admin.returninglist', compact('return_list')); 
    }

}
