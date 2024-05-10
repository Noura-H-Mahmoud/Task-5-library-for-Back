@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roots.index') }}"> Back</a>
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
    {!! Form::open(array('route' => 'roots.store','method'=>'POST')) !!}
    <div class="row g-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong for="parent_id">Main Category:</strong>
                <input type="text" name="name" id="" placeholder="Main Category Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-start">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection