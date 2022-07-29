@extends('frontlayout')
@section('content')
    <div class="container my-4">
        <h3 class="mb-3">Room's Booking</h3>
        

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
                            <input type="hidden" name="costumer_id" value="{{session('data')[0]->id}}">
                            <input type="submit" class="btn btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    </div>

    
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
                                _html+='<option value="'+row.room.id+'">'+row.room.title+' - '+row.roomtype.title+'</option>';
                            });
                            $(".room-list").html(_html);
                        }
                    });
                });
            });
        </script>
    @endsection
@endsection