@extends('layouts.master')

@section('judul', 'Edit book')

@section('content')
    <h2>Update New book</h2>
    <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="row">
            {{-- id --}}
            <div class="col-md-6 mb-3">
                <label for="id">id</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id"
                    value="{{ old('id') ?? $book->id}}">
                @error('id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- judul --}}
            <div class="col-md-6 mb-3">
                <label for="judul">judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                    id="judul" value="{{ old('judul') ?? $book->judul }}">
                @error('judul')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="row">
            {{-- halaman --}}
            <div class="col-md-6 mb-3">
                <label for="halaman">halaman</label>
                <input type="text" class="form-control @error('halaman') is-invalid @enderror" name="halaman"
                    id="halaman" value="{{ old('halaman') ?? $book->halaman}}">
                @error('halaman')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- kategori --}}
            <div class="col-md-6 mb-3">
                <label for="kategori">kategori</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                    id="kategori" value="{{ old('kategori') ?? $book->kategori}}">
                @error('kategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- penerbit --}}
            <div class="col-md-6 mb-3">
                <label for="penerbit">penerbit</label>
                <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit"
                    id="penerbit" value="{{ old('penerbit') ?? $book->penerbit}}">
                @error('penerbit')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
    </form>
@endsection