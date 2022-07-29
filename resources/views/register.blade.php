@extends('frontlayout')
@section('content')
    <div class="container my-4">
        <h3 class="mb-3">Register</h3>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif

        @if (Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif
        <form method="POST" action="{{url('admin/costumer')}}">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>Full Name <span class="text-danger">*</span></th>
                    <td><input type="text" class="form-control" name="full_name" required></td>
                </tr>
                <tr>
                    <th>Email <span class="text-danger">*</span></th>
                    <td><input type="email" class="form-control" name="email" required></td>
                </tr>
                <tr>
                    <th>Password <span class="text-danger">*</span></th>
                    <td><input type="password" class="form-control" name="password" required></td>
                </tr>
                <tr>
                    <th>Mobile <span class="text-danger">*</span></th>
                    <td><input type="number" class="form-control" name="mobile" required></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input type="text" class="form-control" name="address"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn btn-primary" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
@endsection