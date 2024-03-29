@extends('frontlayout')
@section('content')
    <div class="container my-4">
        <h3 class="mb-3">Login</h3>
        @if (Session::has('error'))
            <p class="text-danger">{{session('error')}}</p>
        @endif
        <form method="POST" action="{{url('costumer/login')}}">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>Email <span class="text-danger">*</span></th>
                    <td><input type="email" class="form-control" name="email" required></td>
                </tr>
                <tr>
                    <th>Password <span class="text-danger">*</span></th>
                    <td><input type="password" class="form-control" name="password" required></td>
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