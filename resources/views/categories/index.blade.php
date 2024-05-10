
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Categories</h2>
                </div>
                <div class="pull-right">
                    {{-- @can('category-create') --}}
                    <a class="btn btn-success" href="{{route('categories.create')}}"> Create New category</a>
                    {{-- @endcan --}}
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
              <th> Name</th>
              <th>Main Category</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                     <td>{{$category->name}}</td>
                     <td>{{$category->parent_id}}</td>
                    <td>
                    <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Show</a>
                        {{-- @can('category-edit') --}}
                        <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
                        {{-- @endcan --}}
                        @csrf
                        @method('DELETE')
                        {{-- @can('category-delete') --}}
                        <button type="submit" class="btn btn-danger">Delete</button>
                        {{-- @endcan --}}
                    </form>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
@endsection