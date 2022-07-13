@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Booking
                <a href="{{url('admin/booking')}}" class="btn btn-primary float-right">List</a>
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
                <form method="POST" enctype="multipart/form-data" action="{{url('admin/booking')}}">
                    @csrf
                    <table class="table table-bordered" >
                        <tr>
                            <th>Select the Costumer<span class="text-danger">*</span></th>
                            <td><select class="form-control" name="costumer_id">
                                <option>------Select the Costumer-------</option>
                                @foreach($data as $costumer)
                                    <option value="{{$costumer->id}}">{{$costumer->full_name}}</option>
                                @endforeach
                            </select></td>
                        </tr>
                        <tr>
                            <th>ChekIn Date<span class="text-danger">*</span></th>
                            <td><input type="date" name="checkin_date" value="" class="form-control checkin-date"></td>
                        </tr>
                        <tr>
                            <th>ChekOut Date<span class="text-danger">*</span></th>
                            <td><input type="date" name="checkout_date" value="" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Total Adult<span class="text-danger">*</span></th>
                            <td><input type="number" name="total_adults" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Total Children<span class="text-danger">*</span></th>
                            <td><input type="number" name="total_children" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Available Rooms<span class="text-danger">*</span></th>
                            <td><select class="form-control room-list" name="room_id">
                                <option>------Select the Room-------</option>

                            </select></td>
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
        $(".checkin-date").on('blur',function(){
            var _checkindate=$(this).val();
            $.ajax({
                url:"{{url('admin/booking')}}/available-rooms/"+_checkindate,
                dataType:'json',
                beforeSend:function(){
                    $(".room-list").html('<option>--- Loading ---</option>');
                },
                success:function(res){
                    var _html='';
                    $.each(res.data, function(index,row){
                        _html+='<option value="'+row.id+'">'+row.title+'</option>';
                    });
                    $(".room-list").html(_html);
                }
            });
        });
    });
</script>
@endsection

@endsection