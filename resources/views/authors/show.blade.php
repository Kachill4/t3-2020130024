@extends('layouts.master')

@section('nama', $author->title)

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $author->nama }}</h2>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-primary ml-3">Edit</a>
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3">Delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p>
            <hr>
    </div>
    <p>
    <ul class="list-inline">
        <li class="list-inline-item">
            <i class="fa fa-th-large fa-fw"></i>
            <em>{{ 'Kota: ' . $author->kota }}</em>
        </li><br>
        <li class="list-inline-item">
            <i class="fa fa-calendar fa-fw"></i>
            {{ 'Negara: ' . $author->negara }}
        </li><br>
    </ul>
    </p><br><br><br><br>




@endsection
