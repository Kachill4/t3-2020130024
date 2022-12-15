@extends('layouts.master')

@section('judul', 'authors List')

@push('css_after')
    <style>
        td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>authors List</h2>
                    </div>
                    <div class="col-sm-6" align="right">
                        <a href="{{ route('authors.create') }}" class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>+ Add New author</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Id</th>
                        <th>nama</th>
                        <th>kota</th>
                        <th>negara</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($authors as $author)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="{{ route('authors.show', $author->id) }}">{{ $author->id }}</a></td>
                            <td>{{ $author->nama }}</td>
                            <td>{{ $author->kota }}</td>
                            <td>{{ $author->negara }}</td>
                            <td><a href="{{ route('authors.edit', $author->id) }}">
                                <button type="submit" class="btn btn-light ml-3"  >
                                . . .
                            </button></a>
                        </td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="6">No data yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
