@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Costumer's details
                <a href="{{url('admin/costumer')}}" class="btn btn-primary float-right">List</a>
            </h6>
        </div>
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif

            @if (Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form method="POST" enctype="multipart/form-data" action="{{url('admin/costumer/'.$data->id)}}">
                    @csrf
                    @method('put')
                    <table class="table table-bordered" >
                        <tr>
                            <th>Full Name <span class="text-danger">*</span></th>
                            <td><input type="text" value="{{$data->full_name}}" name="full_name" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Email<span class="text-danger">*</span></th>
                            <td><input type="email" value="{{$data->email}}" name="email" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Mobile<span class="text-danger">*</span></th>
                            <td><input type="number" value="{{$data->mobile}}" name="mobile" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><input type="file" name="photo"><input type="hidden" name="prev_photo" value="{{$data->photo}}"><img src="{{asset('storage/app/'.$data->photo)}}"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><input type="text" value="{{$data->address}}" name="address" class="form-control"></td>
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