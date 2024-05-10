@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
            </div>
        </div>
    </div>
    
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('route' => 'categories.store','method'=>'POST')) !!}
    <div class="row g-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong for="parent_id">Category:</strong>
                <input type="text" name="name" id="" placeholder="Category Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong for="parent_id">Category:</strong>
                <select name="parent_id" id="parent_id">
                <option value="">Select Main Category</option>
                @foreach($roots as $root)
                    <option value="{{ $root->id }}">{{ $root->name }}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-start">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection