@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>phone</th>
            <th>Address</th>
            <th>gender</th>
            <th>IDcard</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($customer as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->name_customer}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->address}}</td>
                <td>
                    @if($customer ->gender == 0)
                        {{'Male'}}
                    @elseif($customer -> gender == 1)
                        {{'FeMale'}}
                    @else
                        {{'khac'}}
                    @endif
                </td>
                <td>{{$customer->IDcard}}</td>
                <td>
                    <a href="{{route('customer.edit',$customer -> id)}}">
                        <button   class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="{{route('customer.destroy',$customer->id)}}" method="post">
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
