@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Room's types
                <a href="{{url('admin/costumer')}}" class="btn btn-primary float-right">List</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" >
                    <tr>
                        <th>Full Name <span class="text-danger">*</span></th>
                        <td>{{$data->full_name}}</td>
                    </tr>
                    <tr>
                        <th>Email<span class="text-danger">*</span></th>
                        <td>{{$data->email}}</td>
                    </tr>
                    <tr>
                        <th>Mobile<span class="text-danger">*</span></th>
                        <td>{{$data->mobile}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$data->address}}</td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td><img width="100" height="100" src="{{asset('imgs/'.$data->photo)}}"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection