@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit old category</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('categories.update',$category->id)}}" method="post">
            @csrf
            @method('PUT')
             <div class="row g-4">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                        <input value="{{$category->name}}" type="text" name="name" id="" placeholder="category name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-start">
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </form>
    </div>
@endsection