<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model BookModel
use App\Models\BookModel;

class BookController extends Controller
{
    //method untuk tampil data buku
    public function bookappears()
    {
        $databook = BookModel::orderby('book_code', 'ASC')
        ->paginate(5);

        return view('halaman/view_book',['book'=>$databook]);
    }

    //method untuk tambah data buku
    public function bookadd(Request $request)
    {
        $this->validate($request, [
            'book_code' => 'required',
            'title' => 'required',
            'author' => 'required',
            'category' => 'required'
        ]);

        BookModel::create([
            'book_code' => $request->book_code,
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category
        ]);

        return redirect('/book');
    }

     //method untuk hapus data buku
     public function bookdelete($book_id)
     {
         $databook=BookModel::find($book_id);
         $databook->delete();
 
         return redirect()->back();
     }

     //method untuk edit data buku
    public function bookedit($book_id, Request $request)
    {
        $this->validate($request, [
            'book_code' => 'required',
            'title' => 'required',
            'author' => 'required',
            'category' => 'required'
        ]);

        $book_id = BookModel::find($book_id);
        $book_id->book_code   = $request->book_code;
        $book_id->title      = $request->title;
        $book_id->author  = $request->author;
        $book_id->category   = $request->category;

        $book_id->save();

        return redirect()->back();
    }
}