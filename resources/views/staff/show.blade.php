@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$data->full_name}}'s details
                <a href="{{url('admin/staff')}}" class="btn btn-primary float-right">List</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" >
                    <tr>
                        <th>Departement</th>
                        <td>{{$data->departement->title}}</td>
                    </tr>
                    <tr>
                        <th>Full Name</th>
                        <td>{{$data->full_name}}</td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td>{{$data->bio}}</td>
                    </tr>
                    <tr>
                        <th>Salary Type</th>
                        <td>{{$data->salary_type}}</td>
                    </tr><tr>
                        <th>Salary Amount</th>
                        <td>{{$data->salary_amt}}</td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td><img width="100" src="{{asset('imgs/'.$data->photo)}}"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection