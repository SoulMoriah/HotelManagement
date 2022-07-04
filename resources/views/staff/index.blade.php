@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">STAFF
                <a href="{{url('admin/staff/create')}}" class="btn btn-primary float-right">Add New</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Departement</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Departement</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if ($data)
                        @foreach ($data as $dat)
                            <tr>
                                <td>{{$dat->id}}</td>
                                <td>{{$dat->full_name}}</td>
                                <td>{{$dat->departement->title}}</td>
                                <td><img width="100" src="{{asset('imgs/'.$dat->photo)}}"></td>
                                <td>
                                    <a href="{{url('admin/staff/'.$dat->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('admin/staff/'.$dat->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{url('admin/staff/payements/'.$dat->id)}}" class="btn btn-dark btn-sm"><i class="fa fa-credit-card"></i></a>
                                    <a onclick="return confirm('Are you sûre to delete this ?')" href="{{url('admin/staff/'.$dat->id.'/delete')}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>  
                        @endforeach
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
 @section('scripts')
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
 @endsection

@endsection