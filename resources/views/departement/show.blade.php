@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$data->title}} Departement's Details
                <a href="{{url('admin/departement')}}" class="btn btn-primary float-right">List</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" >
                    <tr>
                        <th>Title</th>
                        <td>{{$data->title}}</td>
                    </tr>
                    <tr>
                        <th>Room Type</th>
                        <td>{{$data->detail}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection