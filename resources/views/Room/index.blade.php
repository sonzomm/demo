@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>room name</th>
            <th>type room</th>
            <th>status</th>
                     <th>checkin</th>
            <th>checkout</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($rooms as $rooms)
            <tr>
                <td>{{$rooms->id}}</td>
                <td>{{$rooms->room_name}}</td>
                <td>{{$rooms->name}}</td>
                <td> @if($rooms->status == 0)
                        {{'Book Room'}}
                    @elseif($rooms->status == 1)
                        {{'Booked'}}
                    @else
                        {{'khac'}}
                    @endif</td>

                <td><a href="{{route('booking.index')}}">
                        <button class="btn btn-danger">check in</button>
                    </a></td>
                <td><a href="{{route('booking.index')}}">
                        <button class="btn btn-danger">check out</button>
                    </a></td>
                <td>
                    <a href="{{route('room.edit',$rooms->id)}}">
                        <button   class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="{{route('room.destroy',$rooms->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <th>
                    <a href="{{route('booking.index')}}">
                        <button class="btn-app"> chi tiết</button>
                    </a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@push('js')
    <script>
        $(document).ready(function (){
            $('#room').addClass('menu-open');
            $('#room_index').addClass('active');
            $('#room_manage').addClass('active');
        });
    </script>
@endpush
