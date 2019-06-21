@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   <a href="/datauser/create" class="btn btn-primary">Create User</a>
                   <h3>Your Data User</h3>
                   @if(count($datauser) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($datauser as $data)
                            <tr>
                                    <td>{{$data->name}}</td>
                                    <td><a href="/datauser/{{$data->id}}/edit" class="btn btn-default">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['DataUserController@destroy', $data->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        @else 
                            <p>You Have No Data User</p>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
