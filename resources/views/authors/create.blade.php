@extends('layouts.master')

@section('id', 'Add New author')

@section('content')
    <h2>Add New author</h2>

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="row">
            {{-- id --}}
            <div class="col-md-6 mb-3">
                <label for="id">id</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id"
                    value="{{ old('id') }}">
                @error('id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- nama --}}
            <div class="col-md-6 mb-3">
                <label for="nama">nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    id="nama" value="{{ old('nama') }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            {{-- kota --}}
            <div class="col-md-6 mb-3">
                <label for="kota">kota</label>
                <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota"
                    id="kota" value="{{ old('kota') }}">
                @error('kota')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- negara --}}
            <div class="col-md-6 mb-3">
                <label for="negara">negara</label>
                <input type="text" class="form-control @error('negara') is-invalid @enderror" name="negara"
                    id="negara" value="{{ old('negara') }}">
                @error('negara')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
    </form>
@endsection
