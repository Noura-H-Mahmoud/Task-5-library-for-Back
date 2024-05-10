
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit old main category</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('roots.index') }}"> Back</a>
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
        <form action="{{route('roots.update',$root->id)}}" method="post">
            @csrf
            @method('PUT')
             <div class="row g-2">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                        <input value="{{$root->name}}" type="text" name="name" id="" placeholder="main category name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-start">
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </form>
    </div>
@endsection