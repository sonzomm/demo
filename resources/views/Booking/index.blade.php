@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>Booking date</th>
            <th>Name Staff</th>
            <th>Name Customer</th>
            <th>room</th>
            <th>servie</th>
            <th>date checkin</th>
            <th>date checkout</th>
            <th>Day</th>
            <th>total price</th>
            <th>status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($booking as $booking)
            <tr>
                <td>{{$booking->id}}</td>
                <td>{{$booking->booking_date}}</td>
                <td>{{$booking->name_staff}}</td>
                <td>{{$booking->name_customer}}</td>
                <td>{{$booking->room_name}}</td>
                <td>{{$booking->name_service}}</td>
                <td>{{$booking->date_checkout}}</td>
                <td>{{$booking->date_checkin}}</td>
                <td>{{$booking->day}}</td>
                <td>{{$booking->total_price}}</td>
                <td> @if($booking->status == 0)
                        {{'Đã thanh toán'}}
                    @elseif($booking->status == 1)
                        {{'Chưa Thanh Toán'}}
                    @else
                        {{'khac'}}
                    @endif</td>
                <td>
                    <a href="{{route('booking.edit',$booking->id)}}">
                        <button   class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="{{route('booking.destroy',$booking->id)}}" method="post">
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

