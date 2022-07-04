@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit {{$data->full_name}}'s details
                <a href="{{url('admin/staff')}}" class="btn btn-primary float-right">List</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form method="POST" enctype="multipart/form-data" action="{{url('admin/staff/'.$data->id)}}">
                    @csrf
                    @method('put')
                    <table class="table table-bordered" >
                        <tr>
                            <th>Select Departement</th>
                            <td>
                                <select name="departement_id" class="form-control">
                                    <option value="0">--- select ---</option>
                                    @foreach ($departs as $dp)
                                        <option @if($data->id==$dp->id) selected @endif value="{{$dp->id}}">{{$dp->title}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Full Name</th>
                        <td><input type="text" name="full_name" value="{{$data->full_name}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td><textarea name="bio" class="form-control">{{$data->full_name}}</textarea></td>
                        </tr>
                        <tr>
                            <th>Salary Type</th>
                            <td>
                                <input @if($data->salary_type=='daily') checked @endif type="radio" name="salary_type" value="daily"> Daily
                                <input @if($data->salary_type=='monthly') checked @endif type="radio" name="salary_type" value="monthly"> Monthly
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Amount</th>
                            <td><input type="number" name="salary_amt" value="{{$data->salary_amt}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><input type="file" name="photo"><input type="hidden" name="prev_photo" value="{{$data->photo}}"><img width="100" height="100" src="{{asset('imgs/'.$data->photo)}}"></td>
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