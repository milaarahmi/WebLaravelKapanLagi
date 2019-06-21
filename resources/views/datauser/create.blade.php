@extends('layouts.app')

@section('content')
    <h1>Create User</h1>
    
    {!! Form::open(['action' => 'DataUserController@store', 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
    </div>
    <div class="form-group">
        {{Form::label('dob', 'Date Of Birth')}}
        {{Form::date('dob', '', ['class' => 'form-control', 'placeholder' => 'Date Of Birth'])}}
    </div>
    <div class="form-group">
        {{Form::label('notelp', 'No. Telp')}}
        {{Form::text('notelp', '', ['class' => 'form-control', 'placeholder' => 'No. Telp'])}}
    </div>
    <div class="form-group">
        {{Form::label('gender', 'Gender')}}
        {{Form::text('gender', '', ['class' => 'form-control', 'placeholder' => 'Gender'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection