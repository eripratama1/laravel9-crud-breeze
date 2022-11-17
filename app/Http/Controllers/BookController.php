<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     /**
     * Pada function index akan menampilkan data terbaru yang di input
     * dan dengan method paginate() kita membatasi jumlah data yang akan ditampilkan 
     * tiap halamannya yang mana data tersebut
     * 
     * Akan di tampilkan ke halaman index.blade.php pada folder view/books
     */
    public function index()
    {
        $books = Book::latest()->paginate(4);
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Untuk method create kita akan menapilkan form input data 
     * yang mana data author juga akan ditampilkan pada form tersebut.
     */
    public function create()
    {
        $authors = Author::get();
        return view('books.create', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Pada method store kita akan memanggil request BookRequest 
     * untuk melakukan validasi setelah proses validasi berhasil 
     * data akan di simpan ke table books 
     */
    public function store(BookRequest $request)
    {
        $dataBook = $request->validated();
        Book::create([
            'name' => $dataBook['name'],
            'published_year' => $dataBook['published_year'],
            'author_id' => $dataBook['author_id'],
            'slug' => Str::slug($request->name, '-'),
        ]);
        return redirect()->route('books.create')->with('message', 'Storing Success');
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

    /**
     * Menampilkan form edit data berdasarkan data yang dipilih
     * dan memanggil data authors yang sesuai dengan data buku yang dipilih 
     * untuk di update/ edit  
     */
    public function edit(Book $book)
    {
        $authors = Author::get();
        return view('books.edit', [
            'book' => $book,
            'authors' => $authors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Dan untuk method update kita memanggil proses validasi dari BookRequest
     * jika semua data sesuai dengan rules yang ada pada BookRequest
     * lakukan proses update data yang ada pada tabel books.
     */
    public function update(BookRequest $request, Book $book)
    {
        $dataBook = $request->validated();
        $book->update([
            'name' => $dataBook['name'],
            'published_year' => $dataBook['published_year'],
            'author_id' => $dataBook['author_id'],
            'slug' => Str::slug($request->name, '-'),
        ]);
        //    return dd($books); 
        return redirect()->route('books.index')->with('message', 'Update Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Jalnkan proses hapus data pada tabel books
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('message', 'Delete Success');
    }
}
