@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>pice</th>
            <th>max person</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($type as $type)
            <tr>
                <td>{{$type->id}}</td>
                <td>{{$type->name}}</td>
                <td>{{$type->price}}</td>
                <td>{{$type->max_person}}</td>
                <td>
                    <a href="{{route('type.edit',$type->id)}}">
                        <button   class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="{{route('type.destroy',$type->id)}}" method="post">
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
