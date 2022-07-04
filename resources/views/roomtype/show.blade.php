@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$data->title}} Room Type's Details
                <a href="{{url('admin/roomtype')}}" class="btn btn-primary float-right">List</a>
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
                        <th>Price/days</th>
                        <td>{{$data->price}}</td>
                    </tr>
                    <tr>
                        <th>Detail</th>
                        <td>{{$data->detail}}</td>
                    </tr>
                    <tr>
                        <th>Image's Gallery</th>
                        <td>
                            <table class="table table-bordered mt-2">
                                <tr>
                                    @foreach ($data->roomtypeimages as $img )
                                        <td class="imgcol{{$img->id}}">
                                            <img src="{{('imgs/'.$img->img_src)}}" height="100" >
                                        </td>
                                    @endforeach
                                    
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection