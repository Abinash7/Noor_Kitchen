@extends('Layout.dashboard')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>client Page</h3>
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
                        <h2>Clients List</h2>

                        <div class="clearfix"></div>
                    </div>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{session()->get('message')}}
                    </div>
                    @endif
                    <a href="{{route('client.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add Client</a>
                    <div class="x_content table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <th>S.N</th>
                                <th>Client Name</th>
                                <th>Address</th>
                                <th>Contact Number</th>
                                <th>VAT No.</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach($clients as $key=>$value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->client_name}}</td>
                                    <td>{{$value->client_address}}</td>
                                    <td>{{$value->contact_number}}</td>
                                    <td>{{$value->customer_vat}}</td>
                                    <td><a href="{{route('client.edit',$value->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></button></td>
                                    <td>
                                        <form action="{{route('client.destroy',$value->id)}}" method="POST" onsubmit="return confirm('Are you sure to delete?')">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection