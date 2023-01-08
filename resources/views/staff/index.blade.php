@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>password</th>
            <th>phone</th>
            <th>gender</th>
            <th>date of birth</th>
            <th>role</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($staffs as $staffs)
            <tr>
                <td>{{$staffs->id}}</td>
                <td>{{$staffs->name_staff}}</td>
                <td>{{$staffs->email}}</td>
                <td>{{$staffs->password}}</td>
                <td>{{$staffs->phone}}</td>
                <td>
                    @if($staffs ->gender == 0)
                        {{'Male'}}
                    @elseif($staffs -> gender == 1)
                        {{'FeMale'}}
                    @else
                        {{'khac'}}
                    @endif
                </td>
                <td>{{$staffs->birth}}</td>
                <td> @if($staffs ->role == 0)
                        {{'Manager'}}
                    @elseif($staffs ->role == 1)
                        {{'Staff'}}
                    @else
                        {{'khac'}}
                    @endif</td>
                <td>
                    <a href="{{route('staff.edit',$staffs->id)}}">
                        <button   class="btn btn-warning ">Edit</button>
                    </a>

                </td>
                <td>
                    <form action="{{route('staff.destroy',$staffs->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@push('js')
    <script>
        $(document).ready(function (){
            $('#customer').addClass('menu-open');
            $('#customer_index').addClass('active');
            $('#customer_manage').addClass('active');
        });
    </script>
@endpush
