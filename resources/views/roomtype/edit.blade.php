@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Room's types
                <a href="{{url('admin/roomtype')}}" class="btn btn-primary float-right">List</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form method="POST" action="{{url('admin/roomtype/'.$data->id)}}">
                    @csrf
                    @method('put')
                    <table class="table table-bordered" >
                        <tr>
                            <th>Title</th>
                            <td><input type="text" value="{{$data->title}}" name="title" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Price/Days</th>
                            <td><input type="number" value="{{$data->price}}" name="price" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><textarea name="detail" class="form-control">{{$data->detail}}</textarea></td>
                        </tr>
                        <tr>
                            <th>Image's Gallery</th>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        @foreach ($data->roomtypeimages as $img )
                                            <td class="imgcol{{$img->id}}">
                                                <img src="{{('imgs/'.$img->img_src)}}" height="100" >
                                                <p class="mt-1">
                                                    <button type="button" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger btn-sm delete-image" data-image-id="{{$img->id}}"><i class="fa fa-trash"></i></button>
                                                </p>
                                            </td>
                                        @endforeach
                                        
                                    </tr>
                                </table>
                            </td>
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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".delete-image").on('click', function(){
                var _img_id=$(this).attr('data-image-id');
                var _vm=$(this);
                $.ajax({
                    url:"{{url('admin/roomtypeimage/delete')}}/"+_img_id,
                    //data:{},
                    dataType:'json',
                    beforeSend:function(){
                        _vm.addClass('disabled');
                    },
                    success:function(res){
                        //console.log(res);
                        if(res.bool==true){
                            $(".imgcol"+_img_id).remove();
                            
                        }
                        _vm.removeClass('disabled');
                    }
                });
            })
        });
    </script>
@endsection


@endsection