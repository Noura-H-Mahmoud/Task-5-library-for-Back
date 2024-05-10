@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Books</h2>
                </div>
                <div class="pull-right">
                    @can('book-create')
                    <a class="btn btn-success" href="{{ route('books.create') }}"> Create New Book</a>
                    @endcan
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Author</th>
                <th>Category</th>
                <th width="280px">Action</th>
            </tr>
                @foreach ($books as $book)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>
                    <form action="{{ route('books.destroy',$book->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>
                        {{-- @can('book-edit') --}}
                        <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
                        {{-- @endcan --}}
                        @csrf
                        @method('DELETE')
                        {{-- @can('book-delete') --}}
                        <button type="submit" class="btn btn-danger">Delete</button>
                        {{-- @endcan --}}
                    </form>
                    </td>
                </tr>
                @endforeach
        </table>
        {!! $books->links() !!}
    </div>
@endsection