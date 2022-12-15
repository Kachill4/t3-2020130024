<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'id'        => 'required|max:13',
            'judul'     => 'required|max:255',
            'halaman'   => 'required|integer|max:99999',
            'kategori'  => 'required|max:255',
            'penerbit'  => 'required|max:255'
        ];

        $validated = $request->validate($rules);
        book::create($validated);
        $request->session()
                ->flash('success', "buku baru yang berjudul <b> {$validated['judul']} </b> ditambahkan!");
        return redirect()->route('books.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        $rules = [
            'id'        => 'required|max:13',
            'judul'     => 'required|max:255',
            'halaman'   => 'required|integer|max:99999',
            'kategori'  => 'required|max:255',
            'penerbit'  => 'required|max:255'
        ];

        $validated = $request->validate($rules);
        $book->update($validated);
        $request->session()
                ->flash('success', "buku berjudul  {$validated['judul']}  berhasil di Update!");
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        $book->delete();
        return redirect()->route('books.index')
                ->with('success', "buku berjudul  {$book['judul']}  berhasil di hapus!");
    }
}
