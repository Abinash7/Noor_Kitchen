@extends('Layout.dashboard')
@section('title')
User | List - Noor Kitchen
@endsection
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Page</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">

                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Users List</h2>

                        <div class="clearfix"></div>
                    </div>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{session()->get('message')}}
                    </div>
                    @endif
                    <a href="{{route('users.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add User</a>
                    <div class="x_content table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <th>S.N</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Vehicle</th>
                                <th>Staff ID</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach($users as $key=>$value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->full_name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->role}}</td>
                                    <td>{{$value->contact_number}}</td>
                                    <td>{{$value->address}}</td>
                                    <td>{{$value->vehicle_number}}</td>
                                    <td>{{$value->staff_id}}</td>
                                    <td><a href="{{route('users.edit',$value->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
                                    @if($value->role != "admin")
                                    <td>
                                        <form action="{{route('users.destroy',$value->id)}}" method="POST" onsubmit="return confirm('Are you sure to delete?')">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                    @else
                                    <td>
                                    <button class="btn btn-danger" disabled><i class="fa fa-trash"></i></button>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection