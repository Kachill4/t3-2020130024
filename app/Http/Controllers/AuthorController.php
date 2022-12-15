<?php

namespace App\Http\Controllers;

use App\Models\author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = author::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
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
            'nama'      => 'required|max:255',
            'kota'      => 'required|date',
            'negara'    => 'required|max:255'
        ];

        $validated = $request->validate($rules);
        author::create($validated);
        $request->session()
            ->flash('success', "Author  <b> {$validated['nama']} </b> ditambahkan!");
        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(author $author)
    {
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, author $author)
    {
        $rules = [
            'nama'      => 'required|max:255',
            'tglLahir'  => 'required|date',
            'kota'      => 'required|max:255',
            'email'     => 'required|max:255'
        ];
        $validated = $request->validate($rules);
        $author->update($validated);
        $request->session()
                ->flash('success', "Profile  {$validated['nama']}  berhasil di Update!");
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')
                ->with('success', "Profile  {$author['nama']}  berhasil di hapus!");
    }

    public function insert()
    {
        $author = Author::find(1);

        $author->books()->createMany([
            //isinya array asosiatif
            [
                "judul" => "buku x",
                "halaman" => 10,
                "kategori" => "Action",
                "penerbit" => "Aniplex"
            ],
            [
                "judul" => "buku y",
                "halaman" => 50,
                "kategori" => "Action",
                "penerbit" => "Aniplex"
            ]
        ]);

        echo "Data buku baru milik $author->nama sudah masuk yey!";
    }
}
