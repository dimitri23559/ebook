<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class Bookcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $table = Book::all();
    
            return response()->json([
                'message' => 'Load Data Book Success!',
                'data' => $table
            ], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Book::create([
            "title" => $request->title,
            "description" => $request->description,
            "author" => $request->author,
            "publisher" => $request->publisher,
            "date_of_issue" => $request->date_of_issue
        ]);

        return response()->json([
            "message"=>"Store Data Book Success!",
            "book"=>$table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $table = Book::find($book);
        if($table){
            return $table;
        }else{
            return ["message" => "Data Book Not Found!"];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
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
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Book::find($id);
        if($data){
            $data->title = $request->title ? $request->title : $data->title;
            $data->description = $request->description ? $request->description : $data->description;
            $data->author = $request->author ? $request->author : $data->author;
            $data->publisher = $request->publisher ? $request->publisher : $data->publisher;
            $data->date_of_issue = $request->date_of_issue ? $request->date_of_issue : $data->date_of_issue;
            $data->save();

            return $data;
        }else{
            return ["message" => "Data  Tidak  Ditemukan"];
        }
    }

    // **
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Book  $
    //  * @return \Illuminate\Http\Response
    //  *
    public function destroy($id)
    {
        $data = Book::find($id);
        if($data){
            $data->delete();
            return ["message" => "Data Berhasil Di Hapus"];
        }else{
            return ["message" => "Data Tidak Ditemukan"];
        }
    }
}
