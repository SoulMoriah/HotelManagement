@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Room
                <a href="{{url('admin/room')}}" class="btn btn-primary float-right">List</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form method="POST" action="{{url('admin/room/'.$data->id)}}">
                    @csrf
                    @method('put')
                    <table class="table table-bordered" >
                        
                        <tr>
                            <th>Select Room's type</th>
                            <td>
                                <select name="room_type_id" class="form-control">
                                    <option value="0">--- select ---</option>
                                    @foreach ($roomtypes as $types)
                                        <option @if ($data->room_type_id==$types->id) selected @endif value="{{$types->id}}">{{$types->title}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td><input type="text" value="{{$data->title}}" name="title" class="form-control"></td>
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