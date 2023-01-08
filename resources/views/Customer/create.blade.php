
@extends('index')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{route('customer.add')}}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{old('name')}}">

            </div>
            <div class="form-group">
                <label for="email">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone" value="{{old('phone')}}">
            </div>
            <div class="form-group">
                <label for="password">Address</label>
                <input type="text" name="address" class="form-control" id="password"  value="{{old('address')}}">
            </div>
            <div class="form-radio">
                <label>Gender</label>
                <input type="radio" class="form-radio-input" id="gender_male" value="0" name="gender" checked>
                <label class="form-check-label" for="gender_male">Male</label>
                <input type="radio" class="form-radio-input" id="gender_female" value="1" name="gender">
                <label class="form-check-label" for="gender_male">Female</label>
                <input type="radio" class="form-radio-input" id="gender_other" value="2" name="gender">
                <label class="form-check-label" for="gender_other">Other</label>
            </div>
            <div class="form-group">
                <label for="birth">IDcard</label>
                <input type="number" name="idcard" class="form-control" id="idcard" placeholder="IDcard" value="{{old('idcard')}}">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
@push('js')
    <script>
        $(document).ready(function (){
            $('#customer').addClass('menu-open');
            $('#customer_manage').addClass('active');
            $('#customer_create').addClass('active');
        });
    </script>
@endpush
