@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Staff
                <a href="{{url('admin/staff')}}" class="btn btn-primary float-right">List</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form method="POST" enctype="multipart/form-data" action="{{url('admin/staff')}}">
                    @csrf
                    <table class="table table-bordered" >
                        <tr>
                            <th>Select Departement</th>
                            <td>
                                <select name="departement_id" class="form-control">
                                    <option value="0">--- select ---</option>
                                    @foreach ($departs as $dp)
                                        <option value="{{$dp->id}}">{{$dp->title}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Full Name</th>
                            <td><input type="text" name="full_name" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td><textarea name="bio" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <th>Salary Type</th>
                            <td>
                                <input type="radio" name="salary_type" value="daily"> Daily
                                <input type="radio" name="salary_type" value="monthly"> Monthly
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Amount</th>
                            <td><input type="number" name="salary_amt" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><input type="file" name="photo" class="form-control"></td>
                        </tr>
                        
                        
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="btn btn-primary" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection