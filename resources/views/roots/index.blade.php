@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Main Categories</h2>
                </div>
                <div class="pull-right">
                    {{-- @can('root-create') --}}
                    <a class="btn btn-success" href="{{route('roots.create')}}"> Create New Category</a>
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
              <th>Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($roots as $root)
                <tr>
                    <td>{{$loop->iteration}}</td>
                <td>{{$root->name}}</td>
                    <td>
                    <form action="{{ route('roots.destroy',$root->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('roots.show',$root->id) }}">Show</a>
                        {{-- @can('root-edit') --}}
                        <a class="btn btn-primary" href="{{ route('roots.edit',$root->id) }}">Edit</a>
                        {{-- @endcan --}}
                        @csrf
                        @method('DELETE')
                        {{-- @can('root-delete') --}}
                        <button type="submit" class="btn btn-danger">Delete</button>
                        {{-- @endcan --}}
                    </form>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
@endsection