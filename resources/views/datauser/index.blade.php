@extends('layouts.app')

@section('content')
    <h1>Data User</h1>

    @if(count($datauser) > 0)
        @foreach($datauser as $data)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$data->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/datauser/{{$data->id}}">{{$data->name}}</a></h3>
                        <small>Written on {{$data->created_at}} by {{$data->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$datauser->links()}}
        @else 
        <p>No Post Yet </p>
    @endif
@endsection