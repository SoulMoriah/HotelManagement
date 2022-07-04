@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add {{$staff->full_name}}'s Payement
                <a href="{{url('admin/staff/payements/'.$staff_id)}}" class="btn btn-primary float-right">List</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form method="POST" action="{{url('admin/staff/payement/'.$staff_id)}}">
                    @csrf
                    <table class="table table-bordered" >
                        <tr>
                            <th>Amount</th>
                            <td><input type="text" name="amount" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><input type="date" name="amount_date" class="form-control"></td>
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