@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    
    {!! Form::open(['action' => ['DataUserController@update', $datauser->id], 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $datauser->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::text('email',  $datauser->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
    </div>
    <div class="form-group">
        {{Form::label('dob', 'Date Of Birth')}}
        {{Form::date('dob',  $datauser->dob, ['class' => 'form-control', 'placeholder' => 'Date Of Birth'])}}
    </div>
    <div class="form-group">
        {{Form::label('notelp', 'No. Telp')}}
        {{Form::text('notelp',  $datauser->notelp, ['class' => 'form-control', 'placeholder' => 'No. Telp'])}}
    </div>
    <div class="form-group">
        {{Form::label('gender', 'Gender')}}
        {{Form::text('gender',  $datauser->gender, ['class' => 'form-control', 'placeholder' => 'Gender'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection