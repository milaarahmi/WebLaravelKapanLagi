@extends('layouts.app')

@section('content')
    <a href="\datauser" class="btn btn-default">GoBack</a>
    <h1>{{$datauser->name}}</h1>
    
    <div class="row">
            <div class="col-md-4 col-sm-4">
                <img style="width:100%" src="/storage/cover_images/{{$datauser->cover_image}}">
            </div>
            <div class="col-md-8 col-sm-8">
                    <div>
                            {{$datauser->email}}
                        </div>
                        <div>
                            {{$datauser->dob}}
                        </div>
                        <div>
                            {{$datauser->notelp}}
                        </div>
                        <div>
                            {{$datauser->gender}}
                        </div>
            </div>
        </div>
    <hr>
    <small>Written on {{$datauser->created_at}} by {{$datauser->user->name}}</small>
    <hr>
    <a href="/datauser/{{$datauser->id}}/edit" class="btn btn-default">Edit</a>

    {!!Form::open(['action' => ['DataUserController@destroy', $datauser->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection