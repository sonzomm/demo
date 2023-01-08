
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
    <form method="post" action="{{route('themstaff')}}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="{{old('password')}}">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{old('phone')}}">
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
                <label for="birth">Birthday</label>
                <input type="date" name="birth" class="form-control" id="birth" placeholder="birthday" value="{{old('birth')}}">
            </div>
            <div class="form-radio">
                <label>Role</label>
                <input type="radio" class="form-radio-input" id="role_manager" value="0" name="role" checked >
                <label class="form-check-label" for="gender_male">Manager</label>
                <input type="radio" class="form-radio-input" id="role_staff" value="1" name="role">
                <label class="form-check-label" for="gender_male">Staff</label>
                <input type="radio" class="form-radio-input" id="gender_other" value="2" name="role">
                <label class="form-check-label" for="gender_other">Other</label>
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
